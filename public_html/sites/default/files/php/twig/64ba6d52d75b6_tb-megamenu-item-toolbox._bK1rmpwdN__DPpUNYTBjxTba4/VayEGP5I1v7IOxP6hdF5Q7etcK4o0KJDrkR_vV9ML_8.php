<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/tb_megamenu/templates/backend/tb-megamenu-item-toolbox.html.twig */
class __TwigTemplate_664a7e48b7a54fa5dfbbadebb639cd1a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div id=\"tbm-admin-mm-toolitem\" class=\"admin-toolbox\">
  <h3>";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Item Configuration"));
        echo " (<a href=\"#\" class=\"back-megamenu-toolbox\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("MegaMenu Toolbox"));
        echo "</a>)</h3>
  <p>";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Configure each link within a menu."));
        echo "</p>
  <div class=\"tbm-tools-container\">
    <div id=\"toogle-submenu-wrapper\">
      <label class=\"hasTip\" aria-label=\"";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Enable or disable a submenu for this menu item."));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Show submenu"));
        echo "</label>
      <fieldset class=\"radio btn-group toolitem-sub\">
        <input type=\"radio\" id=\"toggleSub0\" class=\"toolbox-toggle\" data-action=\"toggleSub\" name=\"toggleSub\" value=\"0\" />
        <label for=\"toggleSub0\" title=\"";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Disable submenu"));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No"));
        echo "</label>
        <input type=\"radio\" id=\"toggleSub1\" class=\"toolbox-toggle\" data-action=\"toggleSub\" name=\"toggleSub\" value=\"1\" checked=\"checked\"/>
        <label for=\"toggleSub1\" title=\"";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Enable submenu"));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Yes"));
        echo "</label>
        </fieldset>
    </div>
    <div id=\"toogle-group-wrapper\">
      <label class=\"hasTip\" aria-label=\"";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Submenu as flyout"));
        echo " - ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("When set to 'yes', the item's submenu will appear when the user hovers over the menu item. When set to 'no', the submenu links will always be visible below the menu item."));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Submenu as flyout"));
        echo "</label>
      <fieldset class=\"radio btn-group toolitem-group\">
        <input type=\"radio\" id=\"toggleGroup0\" class=\"toolbox-toggle\" data-action=\"toggleGroup\" name=\"toggleGroup\" value=\"0\"/>
        <label for=\"toggleGroup0\" title=\"";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Submenu items show only when the user hovers or clicks on this item."));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Yes"));
        echo "</label>
        <input type=\"radio\" id=\"toggleGroup1\" class=\"toolbox-toggle\" data-action=\"toggleGroup\" name=\"toggleGroup\" value=\"1\" checked=\"checked\"/>
        <label for=\"toggleGroup1\" title=\"";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Submenu items are always visible under this item."));
        echo " \">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No"));
        echo "</label>
      </fieldset>
    </div>
    <div id=\"toogle-break-column-wrapper\">
      <label class=\"hasTip\" aria-label=\"";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Break column"));
        echo " - ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Move the item to the left or right column, or create a new column if one does not exist on the chosen side."));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Break column"));
        echo "</label>
      <fieldset class=\"btn-group\">
        <a href=\"\" class=\"btn toolitem-moveleft toolbox-action\" data-action=\"moveItemsLeft\" title=\"";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Move the menu item to the left column."));
        echo "\">&larr;</a>
        <a href=\"\" class=\"btn toolitem-moveright toolbox-action\" data-action=\"moveItemsRight\" title=\"";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Move the menu item to the right column."));
        echo "\">&rarr;</a>
      </fieldset>      
    </div>
    <div>
      <label class=\"hasTip\" aria-label=\"";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("CSS class"));
        echo " - ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Attach a custom CSS class to this menu item."));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("CSS class"));
        echo "</label>
      <input type=\"text\" class=\"input-medium toolitem-exclass toolbox-input\" name=\"toolitem-exclass\" data-name=\"class\" value=\"\" />
    </div>
    ";
        // line 34
        if (($context["fontawesome"] ?? null)) {
            // line 35
            echo "      <div>
        <label class=\"hasTip\" aria-label=\"";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Icon"));
            echo " - ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Add a Font Awesome icon for this menu item, such as 'fa fa-search'."));
            echo "\">
          ";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Icon"));
            echo "
        </label>
        <input type=\"text\" class=\"input-medium toolitem-xicon toolbox-input\" name=\"toolitem-xicon\" data-name=\"xicon\" value=\"\" />
      </div>
    ";
        } else {
            // line 42
            echo "      <div>
        <label class=\"hasTip label--disabled\" aria-label=\"";
            // line 43
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Icon"));
            echo " - ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("You must enable the Font Awesome module in order to add icons."));
            echo "\">
          ";
            // line 44
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Icon"));
            echo "
        </label>
        <input disabled type=\"text\" class=\"input-medium toolitem-xicon toolbox-input\" name=\"toolitem-xicon\" data-name=\"xicon\" value=\"\" />
      </div>
    ";
        }
        // line 49
        echo "    <div>
      <label class=\"hasTip\" aria-label=\"";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Item caption"));
        echo " - ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Add a caption to this menu item. Captions appear just below the menu item text."));
        echo "\">
        ";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Item caption"));
        echo "
      </label>
      <input type=\"text\" class=\"input-large toolitem-caption toolbox-input\" name=\"toolitem-caption\" data-name=\"caption\" value=\"\" />
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/tb_megamenu/templates/backend/tb-megamenu-item-toolbox.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 51,  173 => 50,  170 => 49,  162 => 44,  156 => 43,  153 => 42,  145 => 37,  139 => 36,  136 => 35,  134 => 34,  124 => 31,  117 => 27,  113 => 26,  104 => 24,  95 => 20,  88 => 18,  78 => 15,  69 => 11,  62 => 9,  54 => 6,  48 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/tb_megamenu/templates/backend/tb-megamenu-item-toolbox.html.twig", "/app/public_html/modules/contrib/tb_megamenu/templates/backend/tb-megamenu-item-toolbox.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 34);
        static $filters = array("t" => 2);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
