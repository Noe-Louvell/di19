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

/* User/register.html.twig */
class __TwigTemplate_caaa70fe08947d6ccc5c9c7bf97d987fe4c6d48e7f6c275e40f98bcb3bdb11b2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("index.html.twig", "User/register.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Connectez-vous ";
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
    <div class=\"container-fluid mt-2\">
        ";
        // line 6
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "errorlogin", [], "any", true, true, false, 6)) {
            // line 7
            echo "            <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "errorlogin", [], "any", false, false, false, 7), "html", null, true);
            echo "</div>
        ";
        }
        // line 9
        echo "        <form method=\"post\" action=\"/Register\">
            <p>Adresse e-mail :</p>
            <input type=\"email\" name=\"uti_mail\" class=\"form-control form-control-lg\">
            <p>Nom :</p>
            <input name=\"uti_nom\" class=\"form-control form-control-lg\">
            <p>Prénom :</p>
            <input name=\"uti_prenom\" class=\"form-control form-control-lg\">
            <p>Mot de passe :</p>
            <input type=\"password\" name=\"uti_password\" class=\"form-control form-control-lg\">
            <br>
            <input type=\"submit\">
        </form>
    </div>

";
    }

    public function getTemplateName()
    {
        return "User/register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 9,  65 => 7,  63 => 6,  59 => 4,  55 => 3,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.html.twig\" %}
{% block title %}{{ parent() }} - Connectez-vous {% endblock %}
{% block body %}

    <div class=\"container-fluid mt-2\">
        {% if session.errorlogin is defined %}
            <div class=\"alert alert-danger\">{{ session.errorlogin }}</div>
        {% endif %}
        <form method=\"post\" action=\"/Register\">
            <p>Adresse e-mail :</p>
            <input type=\"email\" name=\"uti_mail\" class=\"form-control form-control-lg\">
            <p>Nom :</p>
            <input name=\"uti_nom\" class=\"form-control form-control-lg\">
            <p>Prénom :</p>
            <input name=\"uti_prenom\" class=\"form-control form-control-lg\">
            <p>Mot de passe :</p>
            <input type=\"password\" name=\"uti_password\" class=\"form-control form-control-lg\">
            <br>
            <input type=\"submit\">
        </form>
    </div>

{% endblock %}", "User/register.html.twig", "C:\\Repo\\tp\\templates\\User\\register.html.twig");
    }
}
