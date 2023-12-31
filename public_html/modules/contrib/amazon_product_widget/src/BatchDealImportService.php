<?php

namespace Drupal\amazon_product_widget;

use Drupal\Core\Site\Settings;

/**
 * Service for batch-importing deals into storage from a CSV.
 *
 * @package Drupal\amazon_product_widget
 */
class BatchDealImportService {

  /**
   * Imports deals into storage from CSV.
   *
   * @param string $filename
   *   Filename from where to import.
   * @param int $total
   *   The total entries in the CSV file.
   * @param array $context
   *   Information about the status of the batch.
   */
  public static function importChunked(
    string $filename,
    int $total,
    array &$context
  ) {
    /** @var \Drupal\amazon_product_widget\DealFeedService $dealFeedService */
    $dealFeedService = \Drupal::service('amazon_product_widget.deal_feed_service');
    $maxProcessingTime = $dealFeedService->getMaxProcessingTime();

    // How many imports to do per call to DealFeedService::import().
    $importsPerRound = Settings::get('amazon_product_widget.deals.imports_per_round', 1000);

    if (!isset($context['sandbox']['filename'])) {
      $context['sandbox']['filename']  = $filename;
      $context['sandbox']['total']     = $total;
      $context['sandbox']['processed'] = 0;
      $context['sandbox']['errors']    = 0;
    }

    $timeStart = time();
    while (TRUE) {
      $state = $dealFeedService->import(
        $context['sandbox']['filename'],
        $context['sandbox']['processed'],
        $importsPerRound
      );

      $context['sandbox']['processed'] += $state->processed;
      $context['results']['processed']  = $state->processed;
      $context['sandbox']['errors']    += $state->errors;
      $context['results']['errors']     = $context['sandbox']['errors'];

      if (
        $state->finished ||
        $context['sandbox']['errors'] >= $dealFeedService->getMaxDealImportErrors()
      ) {
        $context['finished'] = 1;
        $batch = &batch_get();

        // Kill the second set, it's put there by Drupal and has no use for us.
        // The only thing it does is cause a undefined index error when being
        // done with the set. Works nicely, though a bit hackish.
        if (isset($batch['sets']) && count($batch['sets']) === 2) {
          unset($batch['sets'][1]);
        }
        break;
      }

      $timeCurrent = time();
      if ($timeCurrent - $timeStart >= $maxProcessingTime) {
        $batch = &batch_get();
        $batch_next_set = $batch['current_set'] + 1;
        $batch_set = &$batch['sets'][$batch_next_set];
        $batch_set['operations'][] = [
          '\Drupal\amazon_product_widget\BatchDealImportService::importChunked',
        ];

        $batch_set['total']  = $batch_set['count'] = 1;
        $context['finished'] = $context['sandbox']['processed'] / $context['sandbox']['total'];

        $context['message'] = t('Processed @processed out of @total entries with @errors errors.', [
          '@processed' => $context['sandbox']['processed'],
          '@total'     => $context['sandbox']['total'],
          '@errors'    => $context['sandbox']['errors'],
        ]);

        _batch_populate_queue($batch, $batch_next_set);

        break;
      }
    }
  }

  /**
   * Finishes the import.
   *
   * @param bool $success
   *   Success.
   * @param array $results
   *   The results array.
   * @param array $operations
   *   The operations array.
   */
  public static function finishImport(bool $success, array $results, array $operations) {
    /** @var \Drupal\amazon_product_widget\DealFeedService $dealFeedService */
    $dealFeedService = \Drupal::service('amazon_product_widget.deal_feed_service');
    /** @var \Drupal\Core\Messenger\MessengerInterface $messenger */
    $messenger = \Drupal::messenger();

    if ($results['errors'] >= $dealFeedService->getMaxDealImportErrors()) {
      $messenger->addMessage(
        t('Import stopped due to too many invalid deals. Got @errors, max is @max.', [
          '@errors' => $results['errors'],
          '@max' => $dealFeedService->getMaxDealImportErrors(),
        ])
      );
    }
    else {
      $messenger->addMessage(
        t('Import finished with @errors errors. Maximum is @max', [
          '@errors' => $results['errors'],
          '@max' => $dealFeedService->getMaxDealImportErrors(),
        ]),
      );
    }
  }

}
