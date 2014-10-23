<?php

/* SlackissAVShareBundle:layout:layout.html.twig */
class __TwigTemplate_b76d5968fa554c8840079aed413c555f86a327b3297ee1f5d5c21fcd8069a62e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SlackissAVShareBundle:layout:base.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SlackissAVShareBundle:layout:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        $this->displayParentBlock("header", $context, $blocks);
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/slackissavshare/css/avshare.css"), "html", null, true);
        echo "\">
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"container\">
<div class=\"page-header\">
  <h1>李药王 <small>李药师之兄,色即是空,凭空望潇潇雨歇,抬望眼以治国安邦平天下</small></h1>
</div>

";
        // line 14
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "_route"), "method") == "fos_user_registration_register")) {
            // line 15
            $context["nav_active"] = "register";
        }
        // line 17
        echo "
";
        // line 18
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "_route"), "method") == "fos_user_security_login")) {
            // line 19
            $context["nav_active"] = "login";
        }
        // line 21
        echo "


<nav class=\"navbar navbar-default\" role=\"navigation\">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
      <span class=\"sr-only\">Toggle navigation</span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
      <span class=\"icon-bar\"></span>
    </button>
    <a class=\"navbar-brand\" href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("welcome");
        echo "\">色即是空</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
    <ul class=\"nav navbar-nav\">
      ";
        // line 39
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array())) {
            // line 40
            echo "      <li class=\"";
            if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "list")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("avshare_list");
            echo "\">资源列表</a></li>
      <li class=\"";
            // line 41
            if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "picture")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("avshare_picture");
            echo "\">自拍偷拍</a></li>
      ";
            // line 42
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 43
                echo "      <li class=\"";
                if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "admin_member")) {
                    echo "active";
                }
                echo "\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("avshare_admin_member");
                echo "\">会员管理</a></li>
      <li class=\"";
                // line 44
                if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "admin_resource")) {
                    echo "active";
                }
                echo "\"><a href=\"";
                echo $this->env->getExtension('routing')->getPath("avshare_admin_resource");
                echo "\">资源管理</a></li>
      ";
            }
            // line 46
            echo "      <li class=\"";
            if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "logout")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">注销</a></li>
      ";
        } else {
            // line 48
            echo "      <li class=\"";
            if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "login")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\">登录</a></li>
      <li class=\"";
            // line 49
            if ((((array_key_exists("nav_active", $context)) ? (_twig_default_filter((isset($context["nav_active"]) ? $context["nav_active"] : null), "")) : ("")) == "register")) {
                echo "active";
            }
            echo "\"><a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\">注册</a></li>
      ";
        }
        // line 51
        echo "      <li class=\"dropdown hide\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Dropdown <b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"#\">Action</a></li>
          <li><a href=\"#\">Another action</a></li>
          <li><a href=\"#\">Something else here</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">Separated link</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class=\"navbar-form navbar-left hide\" role=\"search\">
      <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" placeholder=\"Search\">
      </div>
      <button type=\"submit\" class=\"btn btn-default\">Submit</button>
    </form>
    <ul class=\"nav navbar-nav navbar-right hide\">
      <li><a href=\"#\">Link</a></li>
      <li class=\"dropdown\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Dropdown <b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
          <li><a href=\"#\">Action</a></li>
          <li><a href=\"#\">Another action</a></li>
          <li><a href=\"#\">Something else here</a></li>
          <li class=\"divider\"></li>
          <li><a href=\"#\">Separated link</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

";
        // line 86
        $this->displayParentBlock("body", $context, $blocks);
        echo "
<div class=\"av-content\">
";
        // line 88
        $this->displayBlock('content', $context, $blocks);
        // line 90
        echo "</div>
</div>
<div class=\"av-footer\">
  <center>
    关于本站 免责声明 合作伙伴 联系信息
  </center>
</div>
";
    }

    // line 88
    public function block_content($context, array $blocks = array())
    {
    }

    // line 99
    public function block_footer($context, array $blocks = array())
    {
        // line 100
        $this->displayParentBlock("footer", $context, $blocks);
        echo "
<script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/slackissavshare/js/avshare.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "SlackissAVShareBundle:layout:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 101,  220 => 100,  217 => 99,  212 => 88,  201 => 90,  199 => 88,  194 => 86,  157 => 51,  148 => 49,  139 => 48,  129 => 46,  120 => 44,  111 => 43,  109 => 42,  101 => 41,  92 => 40,  90 => 39,  81 => 33,  67 => 21,  64 => 19,  62 => 18,  59 => 17,  56 => 15,  54 => 14,  47 => 9,  44 => 8,  38 => 5,  34 => 4,  31 => 3,);
    }
}
