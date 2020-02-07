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

/* User/ValidationUser.html.twig */
class __TwigTemplate_69a5b316b9cd817e58484992de144970b2e8202b8a92320721eb618cecaeefb6 extends Template
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
        $this->parent = $this->loadTemplate("index.html.twig", "User/ValidationUser.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Validation d'article";
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <table class=\"table table-striped\">
    <thead>
    <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">Titre</th>
        <th scope=\"col\">Auteur</th>
        <th scope=\"col\">Date</th>
        <th scope=\"col\">Actions</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ListUser"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 18
            echo "
        <tr>
            <th scope=\"row\"><a href=\"/User/Show/";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 20), "html", null, true);
            echo "\">#";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 20), "html", null, true);
            echo "</a></th>
            <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utimail", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
            <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utinom", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
            <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "utirole", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
            <td>
                <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                    <a class=\"btn btn-success\" href=\"/User/Show/";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 26), "html", null, true);
            echo "\"><i class=\"far fa-eye\"></i></a>
                    <a class=\"btn btn-success\" href=\"/User/Val/";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "IdUti", [], "any", false, false, false, 27), "html", null, true);
            echo "\"><i class=\"fas fa-check-circle\"></i></a>
                </div>
            </td>
        </tr>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    </tbody>

";
    }

    public function getTemplateName()
    {
        return "User/ValidationUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 33,  104 => 27,  100 => 26,  94 => 23,  90 => 22,  86 => 21,  80 => 20,  76 => 18,  72 => 17,  58 => 5,  54 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"index.html.twig\" %}
{% block title %}Validation d'article{% endblock %}

{% block body %}

    <table class=\"table table-striped\">
    <thead>
    <tr>
        <th scope=\"col\">#</th>
        <th scope=\"col\">Titre</th>
        <th scope=\"col\">Auteur</th>
        <th scope=\"col\">Date</th>
        <th scope=\"col\">Actions</th>
    </tr>
    </thead>
    <tbody>
    {% for user in ListUser %}

        <tr>
            <th scope=\"row\"><a href=\"/User/Show/{{ user.IdUti }}\">#{{ user.IdUti }}</a></th>
            <td>{{ user.utimail}}</td>
            <td>{{ user.utinom }}</td>
            <td>{{ user.utirole }}</td>
            <td>
                <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
                    <a class=\"btn btn-success\" href=\"/User/Show/{{ user.IdUti }}\"><i class=\"far fa-eye\"></i></a>
                    <a class=\"btn btn-success\" href=\"/User/Val/{{ user.IdUti }}\"><i class=\"fas fa-check-circle\"></i></a>
                </div>
            </td>
        </tr>

    {% endfor %}
    </tbody>

{% endblock %}", "User/ValidationUser.html.twig", "C:\\Projet\\Blog\\templates\\User\\ValidationUser.html.twig");
    }
}
