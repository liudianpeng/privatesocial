<?php

/* SlackissAVShareBundle:Default:index.html.twig */
class __TwigTemplate_2511a4f42d201bbf7d7f690640658a7ef6b23034ac9112bae44e4c4cbd5e59bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SlackissAVShareBundle:layout:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SlackissAVShareBundle:layout:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "李药王,李药师之兄长";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"row\">
  <div class=\"col-md-3\">
    <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter($this->env->getExtension('assets')->getAssetUrl((("bundles/slackissavshare/images/index/" . (isset($context["index1"]) ? $context["index1"] : null)) . ". .jpg")), "face_image"), "html", null, true);
        echo "\" class=\"img-responsive thumbnail\"/>
  </div>
  <div class=\"col-md-3\">
    <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter($this->env->getExtension('assets')->getAssetUrl((("bundles/slackissavshare/images/index/" . (isset($context["index2"]) ? $context["index2"] : null)) . ". .jpg")), "face_image"), "html", null, true);
        echo "\" class=\"img-responsive thumbnail\"/>
  </div>
  <div class=\"col-md-3\">
    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter($this->env->getExtension('assets')->getAssetUrl((("bundles/slackissavshare/images/index/" . (isset($context["index3"]) ? $context["index3"] : null)) . ". .jpg")), "face_image"), "html", null, true);
        echo "\" class=\"img-responsive thumbnail\"/>
  </div>
  <div class=\"col-md-3\">
    <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('liip_imagine')->filter($this->env->getExtension('assets')->getAssetUrl((("bundles/slackissavshare/images/index/" . (isset($context["index4"]) ? $context["index4"] : null)) . ". .jpg")), "face_image"), "html", null, true);
        echo "\" class=\"img-responsive thumbnail\"/>
  </div>
</div>
<div class=\"well\">
  古人云:君子好色,取之有道,淫之有度,生疏则邪念生!今人曰:人之初,性本色,色相近,习相远,无人爱,性乃迁! 此上文字:共勉!  ---- 李药王
</div>
";
    }

    public function getTemplateName()
    {
        return "SlackissAVShareBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 17,  54 => 14,  48 => 11,  42 => 8,  38 => 6,  35 => 5,  29 => 3,);
    }
}
