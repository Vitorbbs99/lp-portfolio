<?php

// Organização (Padrão)
$jsonLdOrg = '<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Organization",
  "name": "'.SEO_TITLE.'",
  "url": "'.URL.'",
  "logo": "'.LOGO_SHARE.'",
  "image": "'.LOGO_SHARE.'",
  "email": "'.EMAIL_ATENDIMENTO.'",
  "description": "'.SEO_DESCRIPTION.'",
  "address": "'.ENDERECO.'",
  "telephone": "+55'.Tools::somenteNumeros($telsContato[0]).'",
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "sales",
    "telephone": "+55'.Tools::somenteNumeros($telsContato[0]).'",
    "contactOption": "'.URL.'contato"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "'.SEO_TITLE.'",
  "url": "'.URL.'",
  "description": "'.SEO_DESCRIPTION.'",
  "image": "'.LOGO_SHARE.'",
  "headline": "'.SEO_TITLE.'"
}
</script>

';
echo $jsonLdOrg;

// Detalhe do blog
if ($param1 == "post" && $jsonLdPost != "") {
  echo $jsonLdPost;
}

// Detalhe do produto
if ($param1 == "produto" && $jsonLdProd != "") {
  echo $jsonLdProd;
}
