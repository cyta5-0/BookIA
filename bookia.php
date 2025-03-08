<?php
 $conexion = mysqli_connect('127.0.0.1', 'marcelop_uv0055', 'peron3047');
mysqli_select_db ($conexion, 'marcelop_bookia');
mysqli_set_charset($conexion, 'utf8');
?>
<!DOCTYPE html><html lang="es"><head>
<meta charset="utf-8">
<meta name="generator" content="ReSpec 35.2.2">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
// $id = $_GET['id'];
$id = null;
if(isset($_GET['id']) && is_int($_GET['id'])){
   $id = $_GET['id'];
}
if(isset($_GET['id'])){
   $id = $_GET['id']; 
$_GET['id']= htmlentities($_GET['id']);
$_GET['id'] = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$_GET['id'] = (int)$_GET['id'];
//$id = filter_var($id, FILTER_SANITIZE_NUMBER_FLOAT);
 }else{
      $id = "Name not set in GET Method";
 }
 mysqli_real_escape_string($conexion,$id = $_GET['id']);
$dc= "SELECT 
`title`, 
`title_en`,
`creator_1`,
`creator_2`,
`creator_3`,
`subject_1`,
`subject_2`,
`subject_3`,
`subject_6`,
`subject_7`,
`subject_8`,
`description`,
`description_en`,
`publisher`,
`source`,
`format`,
`language`,
`date`,
`identifier`,
`issue`,
`type`,
`contributor`,
SUBSTRING(`date` , 1 , 4 ), 
SUBSTRING(`identifier` , 1 , 2 ), SUBSTRING(`identifier` , 6 , 1 ) 
 FROM `dc`  
 WHERE `identifier`=".$id." LIMIT 1;";
$result=mysqli_query($conexion, $dc) or die( mysqli_error($conexion));
if ($row= mysqli_fetch_array($result)){
do {
echo "<!--Metas-->";
echo ("<meta name=".'"keywords'.'"'. " content=".'"'.$row['title']
.","
.$row['subject_1']
.","
.$row['subject_2']
.","
.$row['subject_3']
.","
.$row['subject_6']
.","
.$row['subject_7']
.","
.$row['subject_8']
.","
.$row['type']
.'"'."> \n");
echo ("<meta name=".'"citation_title'.'"'. " content=".'"'.$row['title'].'"'."> \n");
echo ("<meta name=".'"citation_author'.'"'. " content=".'"'.$row['creator_1'].'"'."> \n");
echo ("<meta name=".'"citation_author'.'"'. " content=".'"'.$row['creator_2'].'"'."> \n");
echo ("<meta name=".'"citation_author'.'"'. " content=".'"'.$row['creator_3'].'"'."> \n");
echo ("<meta name="
.'"citation_abstract_html_url'.'"'." content=".'"https://'.$row['source'].'#abstract'.'"'."> \n");
// PUEDE SER CREATOR FICHA<meta property="article:author" content="https://dialnet.unirioja.es/servlet/autor?codigo=1814408">
//<meta property="og:description" content="Autoría: Marcelo Claudio Perissé.Localización: Técnica administrativa. Nº. 94, 2023.Artículo de Revista en Dialnet.">
echo ("<meta name=".'"citation_date'.'"'. " content=".'"'.$row["SUBSTRING(`date` , 1 , 4 )"].'"'."> \n");
echo ("<meta name=".'"citation_journal_title'.'"'. " content=".'"'."Técnica administrativa".'"'."> \n");
echo ("<meta name=".'"citation_issue'.'"'. " content=".'"'.$row['issue'].'"'."> \n");
echo ("<meta name=".'"citation_volume'.'"'. " content=".'"'.$row['SUBSTRING(`identifier` , 1 , 2 )'].'"'."> \n");
echo ("<meta name=".'"citation_firstpage'.'"'. " content=".'"'.$row['SUBSTRING(`identifier` , 6 , 1 )'].'"'."> \n");
echo ("<meta name=".'"citation_issn'.'"'. " content=".'"'."1666-1680".'"'."> \n");
echo ("<meta name=".'"citation_publisher'.'"'. " content=".'"'."Ciencia y Técnica Administrativa".'"'."> \n");
echo ("<meta name=".'"og:site_name'.'"'. " content=".'"'."Ciencia y Técnica Administrativa".'"'."> \n");
echo ("<meta name=".'"og:title'.'"'. " content=".'"'.$row['title'].'"'."> \n");
echo ("<meta name=".'"og:type'.'"'. " content=".'"'."article".'"'."> \n");
echo ("<meta property=".'"article:section'.'"'. " content=".'"'."Técnica administrativa".'"'."> \n");
echo ("<meta property=".'"og:url'.'"'. " content=".'"https://'.$row['source'].'"'."> \n");
echo ("<meta property=".'"og:image:url'.'"'. " content=".'"'."https://www.cyta.com.ar/index_archivos/cyta_logo_laureles.png".'"'."> \n");
echo ("<meta property=".'"og:image:type'.'"'. " content=".'"'."image/png".'"'."> \n");
echo ("<meta property=".'"og:image:width'.'"'. " content=".'"'."224".'"'."> \n");
echo ("<meta property=".'"og:image:height'.'"'. " content=".'"'."224".'"'."> \n");
echo ("<meta property=".'"article:published_time'.'"'. " content=".'"'.$row['date'].'"'."> \n");
echo ("<meta name=".'"abstract'.'"'. " content=".'"'.$row['description'].'"'."> \n");
echo ("<link rel=".'"schema.DC'.'"'. " href=".'"'."https://purl.org/dc/elements/1.1/".'"'."> \n");
echo ("<meta name=".'"DC.title'.'"'. " content=".'"'.$row['title'].'"'."> \n");
echo ("<meta name=".'"DC.title'.'"'. " content=".'"'.$row['title_en'].'"'."> \n");
echo ("<meta name=".'"DC.creator'.'"'. " content=".'"'.$row['creator_1'].'"'."> \n");
echo ("<meta name=".'"DC.creator'.'"'. " content=".'"'.$row['creator_2'].'"'."> \n");
echo ("<meta name=".'"DC.creator'.'"'. " content=".'"'.$row['creator_3'].'"'."> \n");
echo ("<meta name=".'"DC.subject'.'"'. " content=".'"'.$row['subject_1'].'"'."> \n");
echo ("<meta name=".'"DC.subject'.'"'. " content=".'"'.$row["subject_2"].'"'."> \n");
echo ("<meta name=".'"DC.subject'.'"'. " content=".'"'.$row['subject_3'].'"'."> \n");
echo ("<meta name=".'"DC.subject'.'"'. " content=".'"'.$row['subject_6'].'"'."> \n");
echo ("<meta name=".'"DC.subject'.'"'. " content=".'"'.$row['subject_7'].'"'."> \n");
echo ("<meta name=".'"DC.subject'.'"'. " content=".'"'.$row['subject_8'].'"'."> \n");
echo ("<meta name=".'"DC.description'.'"'. " content=".'"'.$row['description'].'"'."> \n");
echo ("<meta name=".'"DC.description'.'"'. " content=".'"'.$row['description_en'].'"'."> \n");
echo ("<meta name=".'"DC.publisher'.'"'. " content=".'"'.$row['publisher'].'"'."> \n");
//quitar de la base de datos en el campo publisher el ISSN<meta name="DC.publisher" content="Técnica Administrativa ISSN 1666-1680">
echo ("<meta name=".'"DC.identifier'.'"'. " content=".'"'.$_GET['id'].'"'."> \n");
//  VA LA URL<meta name="DC.identifier" content="https://dialnet.unirioja.es/servlet/dcart?info=link&amp;codigo=8974939&amp;orden=0">
echo ("<meta name=".'"DC.source'.'"'. " content=".'"https://'.$row['source'].'"'."> \n");
//<meta name="DC.source" content="Técnica administrativa, ISSN-e 1666-1680, Vol. 22, Nº. 94, 2023">
echo ("<meta name=".'"DC.format'.'"'. " content=".'"'.$row['format'].'"'."> \n");
echo ("<meta name=".'"DC.language'.'"'. " content=".'"'.$row['language'].'"'."> \n");
//curador
echo ("<meta name=".'"DC.contributor'.'"'. " content=".'"'.$row['contributor'].'"'."> \n");
echo ("<meta name=".'"DC.date'.'"'. " content=".'"'.$row['date'].'"'."> \n");
// SOLO AÑO <meta name="DC.date" content="2023">
echo ("<meta name=".'"dcterms.issued'.'"'. " content=".'"'.$row['issue'].'"'."> \n");
echo ("<meta name=".'"DC.type'.'"'. " content=".'"'."https://purl.org/dc/dcmitype/Text".'"'."> \n");
echo ("<meta name=".'"DC.audience'.'"'. " content=".'"'."Researchers".'"'."> \n");
echo ("<meta name=".'"DC.audience'.'"'. " content=".'"'."Investigador".'"'."> \n");
echo ("<meta name=".'"DC.audience'.'"'. " content=".'"'."profesional emprendedor".'"'."> \n");
echo ("<meta name=".'"DC.audience'.'"'. " content=".'"'."entrepreneurial professionals".'"'."> \n");
echo ("<link rel=".'"DCTERMS.isPartOf'.'"'. " href=".'"'."https://portal.issn.org/resource/ISSN/1666-1680".'"'."> \n");
echo ("<link rel=".'"'.'canonical'.'"'. " href=".'"https://'.$row['source'].'"'."> \n");
echo '<script type="application/ld+json">';
echo '{';
echo '"@context": "https://schema.org" ,';
echo '"@graph":[';
echo '{';
echo '"@id": "#issue",';
echo '"@type": "PublicationIssue",';
echo '"issueNumber": "'.$row['issue'].'",';
echo '"datePublished": "'.$row['date'].'",';
echo'"image": ["https://www.cyta.com.ar/index_archivos/cyta_logo_laureles.png"],';

//echo '"image":["https://www.cyta.com.ar/index_archivos/cyta_logo_laureles.png'"],';
echo '"isPartOf": {';
echo '"@id": "#periodical",';
echo '"@type": [';
echo '"PublicationVolume",';
echo '"Periodical"';
echo '],';
echo '"name": "Ciencia y Técnica Administrativa",';
echo '"issn": [';
echo '"1666-1680"';
echo '],';
echo '"volumeNumber": "'.$row['SUBSTRING(`identifier` , 1 , 2 )'].'",';
echo '"publisher" : {';
echo '"@type" : "Organization",';
echo '"name" : "Técnica Administrativa - ISSN: 1666-1680"';
echo '}';
echo '}';
echo '},';
echo '{';
echo '"@type": "ScholarlyArticle",';
echo '"isPartOf": "#issue",';
echo '"abstract": "'.$row['description_en'].'",';
echo '"sameAs": "'.$row['source'].'",';
echo '"about": [';
echo '"Works",';
echo '"Catalog"';
echo '],';
echo '"name": "'.$row["title_en"].'",';
echo '"author": "'.$row['creator_1'].'"';
echo '}';
echo ']';
echo '}';

echo '{';
echo ' "@context" : "https://schema.org/",';
echo ' "@type" : "Article",';
echo ' "name": "'.$row["title_en"].'",';
echo ' "author" : {';
echo ' "@type" : "Person",';
echo '"author": "'.$row['creator_1'].'"';
echo ' },';
echo ' "datePublished" : "'.$row['date'].'",';
echo'"image": ["https://www.cyta.com.ar/index_archivos/cyta_logo_laureles.png"],';
echo '"image" : "data:image/jpeg;base64,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",';
echo '"articleSection" : "'.$row['description_en'].'",';
echo '"url" : "'.$row['source'].'",';
echo '"publisher" : {';
echo '"@type" : "Organization",';
echo '"name" : "Técnica Administrativa",';
echo '"issn": "1666-1680"';
echo '}';
echo '</script>';
} while ($row2 = mysqli_fetch_array($result));
} else {
echo "No se encontró al autor en la base de datos";
};
  ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LQ9TYD7GRR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LQ9TYD7GRR');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="https://www.cyta.com.ar/index_archivos/favicon.ico" rel="shortcut icon" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CyTA</title>
<style>
span.example-title{text-transform:none}
:is(aside,div).example,div.illegal-example{padding:.5em;margin:1em 0;position:relative;clear:both}
div.illegal-example{color:red}
div.illegal-example p{color:#000}
aside.example div.example{border-left-width:.1em;border-color:#999;background:#fff}
</style>
<style>
dfn{cursor:pointer}
.dfn-panel{position:absolute;z-index:35;min-width:300px;max-width:500px;padding:.5em .75em;margin-top:.6em;font-family:"Helvetica Neue",sans-serif;font-size:small;background:#fff;background:var(--indextable-hover-bg,#fff);color:#000;color:var(--text,#000);box-shadow:0 1em 3em -.4em rgba(0,0,0,.3),0 0 1px 1px rgba(0,0,0,.05);box-shadow:0 1em 3em -.4em var(--tocsidebar-shadow,rgba(0,0,0,.3)),0 0 1px 1px var(--tocsidebar-shadow,rgba(0,0,0,.05));border-radius:2px}
.dfn-panel:not(.docked)>.caret{position:absolute;top:-9px}
.dfn-panel:not(.docked)>.caret::after,.dfn-panel:not(.docked)>.caret::before{content:"";position:absolute;border:10px solid transparent;border-top:0;border-bottom:10px solid #fff;border-bottom-color:var(--indextable-hover-bg,#fff);top:0}
.dfn-panel:not(.docked)>.caret::before{border-bottom:9px solid #a2a9b1;border-bottom-color:var(--indextable-hover-bg,#a2a9b1)}
.dfn-panel *{margin:0}
.dfn-panel b{display:block;color:#000;color:var(--text,#000);margin-top:.25em}
.dfn-panel ul a[href]{color:#333;color:var(--text,#333)}
.dfn-panel>div{display:flex}
.dfn-panel a.self-link{font-weight:700;margin-right:auto}
.dfn-panel .marker{padding:.1em;margin-left:.5em;border-radius:.2em;text-align:center;white-space:nowrap;font-size:90%;color:#040b1c}
.dfn-panel .marker.dfn-exported{background:#d1edfd;box-shadow:0 0 0 .125em #1ca5f940}
.dfn-panel .marker.idl-block{background:#8ccbf2;box-shadow:0 0 0 .125em #0670b161}
.dfn-panel a:not(:hover){text-decoration:none!important;border-bottom:none!important}
.dfn-panel a[href]:hover{border-bottom-width:1px}
.dfn-panel ul{padding:0}
.dfn-panel li{margin-left:1em}
.dfn-panel.docked{position:fixed;left:.5em;top:unset;bottom:2em;margin:0 auto;max-width:calc(100vw - .75em * 2 - .5em - .2em * 2);max-height:30vh;overflow:auto}
</style>
  
  
<title>CyTA BooKIA</title>
<!--icon -->
<link rel="shortcut icon" href="https://www.cyta.com.ar/index_archivos/favicon.ico" type="image/vnd.microsoft.icon"/>
<link rel="icon" type="image/png" sizes="32x32" href="https://www.cyta.com.ar/index_archivos/favicon.png">
<!--icon - cierre-->
  

<style id="respec-mainstyle">
@keyframes pop{
0%{transform:scale(1,1)}
25%{transform:scale(1.25,1.25);opacity:.75}
100%{transform:scale(1,1)}
}
a.internalDFN{color:inherit;border-bottom:1px solid #99c;text-decoration:none}
a.externalDFN{color:inherit;border-bottom:1px dotted #ccc;text-decoration:none}
a.bibref{text-decoration:none}
.respec-offending-element:target{animation:pop .25s ease-in-out 0s 1}
.respec-offending-element,a[href].respec-offending-element{text-decoration:red wavy underline}
@supports not (text-decoration:red wavy underline){
.respec-offending-element:not(pre){display:inline-block}
.respec-offending-element{background:url(data:image/gif;base64,R0lGODdhBAADAPEAANv///8AAP///wAAACwAAAAABAADAEACBZQjmIAFADs=) bottom repeat-x}
}
#references :target{background:#eaf3ff;animation:pop .4s ease-in-out 0s 1}
cite .bibref{font-style:normal}
a[href].orcid{padding-left:4px;padding-right:4px}
a[href].orcid>svg{margin-bottom:-2px}
ol.tof,ul.tof{list-style:none outside none}
.caption{margin-top:.5em;font-style:italic}
#issue-summary>ul{column-count:2}
#issue-summary li{list-style:none;display:inline-block}
details.respec-tests-details{margin-left:1em;display:inline-block;vertical-align:top}
details.respec-tests-details>*{padding-right:2em}
details.respec-tests-details[open]{z-index:999999;position:absolute;border:thin solid #cad3e2;border-radius:.3em;background-color:#fff;padding-bottom:.5em}
details.respec-tests-details[open]>summary{border-bottom:thin solid #cad3e2;padding-left:1em;margin-bottom:1em;line-height:2em}
details.respec-tests-details>ul{width:100%;margin-top:-.3em}
details.respec-tests-details>li{padding-left:1em}
.self-link:hover{opacity:1;text-decoration:none;background-color:transparent}
aside.example .marker>a.self-link{color:inherit}
.header-wrapper{display:flex;align-items:baseline}
:is(h2,h3,h4,h5,h6):not(#toc>h2,#abstract>h2,#sotd>h2,.head>h2){position:relative;left:-.5em}
:is(h2,h3,h4,h5,h6):not(#toch2)+a.self-link{color:inherit;order:-1;position:relative;left:-1.1em;font-size:1rem;opacity:.5}
:is(h2,h3,h4,h5,h6)+a.self-link::before{content:"§";text-decoration:none;color:var(--heading-text)}
:is(h2,h3)+a.self-link{top:-.2em}
:is(h4,h5,h6)+a.self-link::before{color:#000}
@media (max-width:767px){
dd{margin-left:0}
}
@media print{
.removeOnSave{display:none}
}
</style>
<meta name="color-scheme" content="light">
<meta name="description" content="This manual is a guide containing best current practice, written for editors and authors of W3C technical reports. No requirements
for W3C publications are in this document. All requirements for W3C
publications are in W3C
Publication Rules.">
<style>
.hljs{--base:#fafafa;--mono-1:#383a42;--mono-2:#686b77;--mono-3:#717277;--hue-1:#0b76c5;--hue-2:#336ae3;--hue-3:#a626a4;--hue-4:#42803c;--hue-5:#ca4706;--hue-5-2:#c91243;--hue-6:#986801;--hue-6-2:#9a6a01}
@media (prefers-color-scheme:dark){
.hljs{--base:#282c34;--mono-1:#abb2bf;--mono-2:#818896;--mono-3:#5c6370;--hue-1:#56b6c2;--hue-2:#61aeee;--hue-3:#c678dd;--hue-4:#98c379;--hue-5:#e06c75;--hue-5-2:#be5046;--hue-6:#d19a66;--hue-6-2:#e6c07b}
}
.hljs{display:block;overflow-x:auto;padding:.5em;color:#383a42;color:var(--mono-1,#383a42);background:#fafafa;background:var(--base,#fafafa)}
.hljs-comment,.hljs-quote{color:#717277;color:var(--mono-3,#717277);font-style:italic}
.hljs-doctag,.hljs-formula,.hljs-keyword{color:#a626a4;color:var(--hue-3,#a626a4)}
.hljs-deletion,.hljs-name,.hljs-section,.hljs-selector-tag,.hljs-subst{color:#ca4706;color:var(--hue-5,#ca4706);font-weight:700}
.hljs-literal{color:#0b76c5;color:var(--hue-1,#0b76c5)}
.hljs-addition,.hljs-attribute,.hljs-meta-string,.hljs-regexp,.hljs-string{color:#42803c;color:var(--hue-4,#42803c)}
.hljs-built_in,.hljs-class .hljs-title{color:#9a6a01;color:var(--hue-6-2,#9a6a01)}
.hljs-attr,.hljs-number,.hljs-selector-attr,.hljs-selector-class,.hljs-selector-pseudo,.hljs-template-variable,.hljs-type,.hljs-variable{color:#986801;color:var(--hue-6,#986801)}
.hljs-bullet,.hljs-link,.hljs-meta,.hljs-selector-id,.hljs-symbol,.hljs-title{color:#336ae3;color:var(--hue-2,#336ae3)}
.hljs-emphasis{font-style:italic}
.hljs-strong{font-weight:700}
.hljs-link{text-decoration:underline}
</style>
<style>
var{position:relative;cursor:pointer}
var[data-type]::after,var[data-type]::before{position:absolute;left:50%;top:-6px;opacity:0;transition:opacity .4s;pointer-events:none}
var[data-type]::before{content:"";transform:translateX(-50%);border-width:4px 6px 0 6px;border-style:solid;border-color:transparent;border-top-color:#222}
var[data-type]::after{content:attr(data-type);transform:translateX(-50%) translateY(-100%);background:#222;text-align:center;font-family:"Dank Mono","Fira Code",monospace;font-style:normal;padding:6px;border-radius:3px;color:#daca88;text-indent:0;font-weight:400}
var[data-type]:hover::after,var[data-type]:hover::before{opacity:1}
</style>
<style>

/******************************************************************************
 *                   Style sheet for the W3C specifications                   *
 *
 * Special classes handled by this style sheet include:
 *
 * Indices
 *   - .toc for the Table of Contents (<ol class="toc">)
 *     + <span class="secno"> for the section numbers
 *   - #toc for the Table of Contents (<nav id="toc">)
 *   - ul.index for Indices (<a href="#ref">term</a><span>, in §N.M</span>)
 *   - table.index for Index Tables (e.g. for properties or elements)
 *
 * Structural Markup
 *   - table.data for general data tables
 *     -> use 'scope' attribute, <colgroup>, <thead>, and <tbody> for best results !
 *     -> use <table class='complex data'> for extra-complex tables
 *     -> use <td class='long'> for paragraph-length cell content
 *     -> use <td class='pre'> when manual line breaks/indentation would help readability
 *   - dl.switch for switch statements
 *   - ol.algorithm for algorithms (helps to visualize nesting)
 *   - .figure and .caption (HTML4) and figure and figcaption (HTML5)
 *     -> .sidefigure for right-floated figures
 *   - ins/del
 *     -> ins/del[cite] for candidate and proposed changes (amendments)
 *
 * Code
 *   - pre and code
 *
 * Special Sections
 *   - .note       for informative notes             (div, p, span, aside, details)
 *   - .example    for informative examples          (div, p, pre, span)
 *   - .issue      for issues                        (div, p, span)
 *   - .advisement for loud normative statements     (div, p, strong)
 *   - .annoying-warning for spec obsoletion notices (div, aside, details)
 *   - .correction for "candidate corrections"       (div, aside, details, section)
 *   - .addition   for "candidate additions"         (div, aside, details, section)
 *   - .correction.proposed for "proposed corrections" (div, aside, details, section)
 *   - .addition.proposed   for "proposed additions"   (div, aside, details, section)
 *
 * Definition Boxes
 *   - pre.def   for WebIDL definitions
 *   - table.def for tables that define other entities (e.g. CSS properties)
 *   - dl.def    for definition lists that define other entitles (e.g. HTML elements)
 *
 * Numbering
 *   - .secno for section numbers in .toc and headings (<span class='secno'>3.2</span>)
 *   - .marker for source-inserted example/figure/issue numbers (<span class='marker'>Issue 4</span>)
 *   - ::before styled for CSS-generated issue/example/figure numbers:
 *     -> Documents wishing to use this only need to add
 *        figcaption::before,
 *        .caption::before { content: "Figure "  counter(figure) " ";  }
 *        .example::before { content: "Example " counter(example) " "; }
 *        .issue::before   { content: "Issue "   counter(issue) " ";   }
 *
 * Header Stuff (ignore, just don't conflict with these classes)
 *   - .head for the header
 *   - .copyright for the copyright
 *
 * Outdated warning for old specs
 *
 * Miscellaneous
 *   - .overlarge for things that should be as wide as possible, even if
 *     that overflows the body text area. This can be used on an item or
 *     on its container, depending on the effect desired.
 *     Note that this styling basically doesn't help at all when printing,
 *     since A4 paper isn't much wider than the max-width here.
 *     It's better to design things to fit into a narrower measure if possible.
 *
 *   - js-added ToC jump links (see fixup.js)
 * 
 *   - .uname and .codepoint for character names and examples
 *
 ******************************************************************************/


/******************************************************************************/
/*                                  Colors                                    */
/******************************************************************************/

/* Any --*-text not paired with a --*-bg is assumed to have a transparent bg */
:root {
	--text: black;
	--bg: white;

	/* Absolute URLs due to https://bugs.webkit.org/show_bug.cgi?id=230243 */
	--unofficial-watermark: url(https://www.w3.org/StyleSheets/TR/2021/logos/UD-watermark-light-unofficial.svg);
	--draft-watermark: url(https://www.w3.org/StyleSheets/TR/2021/logos/UD-watermark-light-draft.svg);

	--logo-bg: #1a5e9a;
	--logo-active-bg: #c00;
	--logo-text: white;

	--tocnav-normal-text: #707070;
	--tocnav-normal-bg: var(--bg);
	--tocnav-hover-text: var(--tocnav-normal-text);
	--tocnav-hover-bg: #f8f8f8;
	--tocnav-active-text: #c00;
	--tocnav-active-bg: var(--tocnav-normal-bg);

	--tocsidebar-text: var(--text);
	--tocsidebar-bg: #f7f8f9;
	--tocsidebar-shadow: rgba(0,0,0,.1);
	--tocsidebar-heading-text: hsla(203,20%,40%,.7);

	--toclink-text: var(--text);
	--toclink-underline: #3980b5;
	--toclink-visited-text: var(--toclink-text);
	--toclink-visited-underline: #054572;

	--heading-text: #005a9c;

	--hr-text: var(--text);

	--algo-border: #def;

	--del-text: #AA0000;
	--del-bg: transparent;
	--ins-text: #006100;
	--ins-bg: transparent;

	--a-normal-text: #034575;
	--a-normal-underline: #707070;
	--a-visited-text: var(--a-normal-text);
	--a-visited-underline: #bbb;
	--a-hover-bg: rgba(75%, 75%, 75%, .25);
	--a-active-text: #c00;
	--a-active-underline: #c00;

	--blockquote-border: silver;
	--blockquote-bg: transparent;
	--blockquote-text: var(--text);

	--issue-border: #e05252;
	--issue-bg: #fbe9e9;
	--issue-text: var(--text);
	--issueheading-text: #831616;

	--example-border: #e0cb52;
	--example-bg: #fcfaee;
	--example-text: var(--text);
	--exampleheading-text: #574b0f;

	--note-border: #52e052;
	--note-bg: #e9fbe9;
	--note-text: var(--text);
	--noteheading-text: hsl(120, 70%, 22%);
	--notesummary-underline: silver;

	--advisement-border: orange;
	--advisement-bg: #fec;
	--advisement-text: var(--text);
	--advisementheading-text: #b35f00;

	--amendment-border: #330099;
	--amendment-bg: #F5F0FF;
	--amendment-text: var(--text);
	--amendmentheading-text: #220066;

	--warning-border: red;
	--warning-bg: hsla(40,100%,50%,0.95);
	--warning-text: var(--text);

	--def-border: #8ccbf2;
	--def-bg: #def;
	--def-text: var(--text);
	--defrow-border: #bbd7e9;

	--datacell-border: silver;

	--indexinfo-text: #707070;

	--indextable-hover-text: black;
	--indextable-hover-bg: #f7f8f9;

	--outdatedspec-bg: rgba(0, 0, 0, .5);
	--outdatedspec-text: black;
	--outdated-bg: maroon;
	--outdated-text: white;
	--outdated-shadow: red;

	--editedrec-bg: darkorange;
}

/******************************************************************************/
/*                                   Body                                     */
/******************************************************************************/

	body {
		counter-reset: example figure issue;

		/* Layout */
		max-width: 50em;             /* limit line length to 50em for readability   */
		margin: 0 auto 4em;          /* center text within page, space for footers  */
		padding: 1.6em 1.5em 0 50px; /* assume 16px font size for downlevel clients */
		padding: 1.6em 1.5em 0 calc(26px + 1.5em); /* leave space for status flag   */

		/* Typography */
		line-height: 1.5;
		font-family: sans-serif;
		widows: 2;
		orphans: 2;
		word-wrap: break-word;
		overflow-wrap: break-word;

		/* Colors */
		color: black;
		color: var(--text);
		background: white top left fixed no-repeat;
		background-color: var(--bg);
		background-size: 25px auto;
	}

/******************************************************************************/
/*                         Front Matter & Navigation                          */
/******************************************************************************/

/** Header ********************************************************************/

	div.head { margin-bottom: 1em; }
	div.head hr { border-style: solid; }

	div.head h1 {
		font-weight: bold;
		margin: 0 0 .1em;
		font-size: 220%;
	}

	#w3c-state {
		margin-top: 0;
		margin-bottom: 1.5em;
		font: 140% sans-serif;   /* Reset all font styling to clear out UA styles */
		font-family: inherit;    /* Inherit the font family. */
		line-height: 1.2;        /* Keep wrapped headings compact */
		hyphens: manual;         /* Hyphenated headings look weird */
		color: #005a9c;
		color: var(--heading-text);
	}

/** W3C Logo ******************************************************************/

	.head p:not(.copyright):first-child {
		margin: 0;
	}

	.head p:not(.copyright):first-child > a,
	.head > a:first-child {
		float: right;
		margin: 0.4rem 0 0.2rem .4rem;
	}

	.head img[src*="logos/W3C"] {
		display: block;
		border: solid #1a5e9a;
		border: solid var(--logo-bg);
		border-width: .65rem .7rem .6rem;
		border-radius: .4rem;
		background: #1a5e9a;
		background: var(--logo-bg);
		color: white;
		color: var(--logo-text);
		font-weight: bold;
	}

	.head a:hover > img[src*="logos/W3C"],
	.head a:focus > img[src*="logos/W3C"] {
		opacity: .8;
	}

	.head a:active > img[src*="logos/W3C"] {
		background: #c00;
		background: var(--logo-active-bg);
		border-color: #c00;
		border-color: var(--logo-active-bg);
	}

	/* see also additional rules in Link Styling section */

/** Copyright *****************************************************************/

	p.copyright,
	p.copyright small { font-size: small; }

/** Back to Top / ToC Toggle **************************************************/

	@media print {
		#toc-nav {
			display: none;
		}
	}
	@media not print {
		#toc-nav {
			position: fixed;
			z-index: 3;
			bottom: 0; left: 0;
			margin: 0;
			min-width: 1.33em;
			border-top-right-radius: 2rem;
			box-shadow: 0 0 2px;
			font-size: 1.5em;
		}
		#toc-nav > a {
			display: block;
			white-space: nowrap;

			height: 1.33em;
			padding: .1em 0.3em;
			margin: 0;

			box-shadow: 0 0 2px;
			border: none;
			border-top-right-radius: 1.33em;

			color: #707070;
			color: var(--tocnav-normal-text);
			background: white;
			background: var(--tocnav-normal-bg);
		}
		#toc-nav > a:hover,
		#toc-nav > a:focus {
			color: black;
			color: var(--tocnav-hover-text);
			background: #f8f8f8;
			background: var(--tocnav-hover-bg);
		}
		#toc-nav > a:active {
			color: #c00;
			color: var(--tocnav-active-text);
			background: white;
			background: var(--tocnav-active-bg);
		}

		#toc-nav > #toc-jump,
		#toc-nav > #toc-toggle {
			padding-bottom: 2em;
			margin-bottom: -1.9em;
		}

		/* statusbar gets in the way on keyboard focus; remove once browsers fix */
		#toc-nav > a[href="#toc"]:not(:hover):focus:last-child {
			padding-bottom: 1.5rem;
		}

		#toc-nav:not(:hover) > a:not(:focus) > span + span {
			/* Ideally this uses :focus-within on #toc-nav */
			display: none;
		}
		#toc-nav > a > span + span {
			padding-right: 0.2em;
		}
	}

/** ToC Sidebar ***************************************************************/

	/* Floating sidebar */
	@media screen {
		body.toc-sidebar #toc {
			position: fixed;
			top: 0; bottom: 0;
			left: 0;
			width: 23.5em;
			max-width: 80%;
			max-width: calc(100% - 2em - 26px);
			overflow: auto;
			padding: 0 1em;
			padding-left: 42px;
			padding-left: calc(1em + 26px);
			color: black;
			color: var(--tocsidebar-text);
			background: inherit;
			background-color: #f7f8f9;
			background-color: var(--tocsidebar-bg);
			z-index: 1;
			box-shadow: -.1em 0 .25em rgba(0,0,0,.1) inset;
			box-shadow: -.1em 0 .25em var(--tocsidebar-shadow) inset;
		}
		body.toc-sidebar #toc h2 {
			margin-top: .8rem;
			font-variant: small-caps;
			font-variant: all-small-caps;
			text-transform: lowercase;
			font-weight: bold;
			color: gray;
			color: hsla(203,20%,40%,.7);
			color: var(--tocsidebar-heading-text);
		}
		body.toc-sidebar #toc-jump:not(:focus) {
			width: 0;
			height: 0;
			padding: 0;
			position: absolute;
			overflow: hidden;
		}
	}
	/* Hide main scroller when only the ToC is visible anyway */
	@media screen and (max-width: 28em) {
		body.toc-sidebar {
			overflow: hidden;
		}
	}

	/* Sidebar with its own space */
	@media screen and (min-width: 78em) {
		body:not(.toc-inline) #toc {
			position: fixed;
			top: 0; bottom: 0;
			left: 0;
			width: 23.5em;
			overflow: auto;
			padding: 0 1em;
			padding-left: 42px;
			padding-left: calc(1em + 26px);
			color: black;
			color: var(--tocsidebar-text);
			background: inherit;
			background-color: #f7f8f9;
			background-color: var(--tocsidebar-bg);
			z-index: 1;
			box-shadow: -.1em 0 .25em rgba(0,0,0,.1) inset;
			box-shadow: -.1em 0 .25em var(--tocsidebar-shadow) inset;
		}
		body:not(.toc-inline) #toc h2 {
			margin-top: .8rem;
			font-variant: small-caps;
			font-variant: all-small-caps;
			text-transform: lowercase;
			font-weight: bold;
			color: gray;
			color: hsla(203,20%,40%,.7);
			color: var(--tocsidebar-heading-text);
		}

		body:not(.toc-inline) {
			padding-left: 29em;
		}
		/* See also Overflow section at the bottom */

		body:not(.toc-inline) #toc-jump:not(:focus) {
			width: 0;
			height: 0;
			padding: 0;
			position: absolute;
			overflow: hidden;
		}
	}
	@media screen and (min-width: 90em) {
		body:not(.toc-inline) {
			margin: 0 4em;
		}
	}

/******************************************************************************/
/*                                Sectioning                                  */
/******************************************************************************/

/** Headings ******************************************************************/

	h1, h2, h3, h4, h5, h6, dt {
		page-break-after: avoid;
		page-break-inside: avoid;
		font: 100% sans-serif;   /* Reset all font styling to clear out UA styles */
		font-family: inherit;    /* Inherit the font family. */
		line-height: 1.2;        /* Keep wrapped headings compact */
		hyphens: manual;         /* Hyphenated headings look weird */
	}

	h2, h3, h4, h5, h6 {
		margin-top: 3rem;
	}

	h1, h2, h3 {
		color: #005a9c;
		color: var(--heading-text);
	}

	h1 { font-size: 170%; }
	h2 { font-size: 140%; }
	h3 { font-size: 120%; }
	h4 { font-weight: bold; }
	h5 { font-style: italic; }
	h6 { font-variant: small-caps; }
	dt { font-weight: bold; }

/** Subheadings ***************************************************************/

	h1 + h2,
	#subtitle {
		/* #subtitle is a subtitle in an H2 under the H1 */
		margin-top: 0;
	}
	h2 + h3,
	h3 + h4,
	h4 + h5,
	h5 + h6 {
		margin-top: 1.2em; /* = 1 x line-height */
	}

/** Section divider ***********************************************************/

	:not(.head) > :not(.head) + hr {
		font-size: 1.5em;
		text-align: center;
		margin: 1em auto;
		height: auto;
		color: black;
		color: var(--hr-text);
		border: transparent solid 0;
		background: transparent;
	}
	:not(.head) > hr::before {
		content: "\2727\2003\2003\2727\2003\2003\2727";
	}

/******************************************************************************/
/*                            Paragraphs and Lists                            */
/******************************************************************************/

	p {
		margin: 1em 0;
	}

	dd > p:first-child,
	li > p:first-child {
		margin-top: 0;
	}

	ul, ol {
		margin-left: 0;
		padding-left: 2em;
	}

	li {
		margin: 0.25em 0 0.5em;
		padding: 0;
	}

	dl dd {
		margin: 0 0 .5em 2em;
	}

	.head dd + dd { /* compact for header */
		margin-top: -.5em;
	}

	/* Style for algorithms */
	ol.algorithm ol:not(.algorithm),
	.algorithm > ol ol:not(.algorithm) {
	 border-left: 0.5em solid #def;
	 border-left: 0.5em solid var(--algo-border);
	}

	/* Style for switch/case <dl>s */
	dl.switch > dd > ol.only {
	 margin-left: 0;
	}
	dl.switch > dd > ol.algorithm {
	 margin-left: -2em;
	}
	dl.switch {
	 padding-left: 2em;
	}
	dl.switch > dt {
	 margin-top: 1em;
	}
	dl.switch > dt + dt {
	 margin-top: 0;
	}

	/* For older browsers */
	dl.switch > dt::before {
	 content: '\21AA';
	 padding: 0 0.5em 0 0;
	 display: inline-block;
	 width: 1em;
	 text-align: right;
	 line-height: 0.5em;
	}
	dl.switch > dt {
	 text-indent: -1.5em;
	}
	:where(dl.switch > dt > *) {
		text-indent: 0; /* break inheritance on e.g. list children */
	}
	/* Undo above styling and use list-style for proper bullets */
	@supports (list-style: "\21AA  ") {
		dl.switch > dt {
			display: list-item;
			counter-increment: list-item 0;
			list-style: "\21AA  ";
			margin-left: -1.5em;
			text-indent: 0;
		}
		dl.switch > dt::before {
			content: none;
		}
	}


/** Terminology Markup ********************************************************/


/******************************************************************************/
/*                                 Inline Markup                              */
/******************************************************************************/

/** Terminology Markup ********************************************************/
	dfn   { /* Defining instance */
		font-weight: bolder;
	}
	a > i { /* Instance of term */
		font-style: normal;
	}
	dt dfn code, code.idl {
		font-size: inherit;
	}
	dfn var {
		font-style: normal;
	}

/** Change Marking ************************************************************/

	del {
		color: #AA0000;
		color: var(--del-text);
		background: transparent;
		background: var(--del-bg);
		text-decoration: line-through;
	}
	ins {
		color: #006100;
		color: var(--ins-text);
		background: transparent;
		background: var(--ins-bg);
		text-decoration: underline;
		text-decoration-style: dashed;
	}
	ins:not(#dontusethisid) *,
	del:not(#dontusethisid) * {
		color: inherit;
	}
	ins:not([hidden]).diff-inactive,
	del:not([hidden]).diff-inactive {
		all: unset;
	}
	ins:not(.diff-inactive) *,
	del:not(.diff-inactive) * {
		color: inherit;
	}

	/* for amendments (candidate/proposed changes) */
	.amendment ins, .correction ins, .addition ins,
	ins[cite] { text-decoration-style: dotted; }
	.amendment del, .correction del, .addition del,
	del[cite] { text-decoration-style: dotted; }
	.amendment.proposed ins, .correction.proposed ins, .addition.proposed ins,
	ins[cite].proposed { text-decoration-style: double; }
	.amendment.proposed del, .correction.proposed del, .addition.proposed del,
	del[cite].proposed { text-decoration-style: double; }

/** Miscellaneous improvements to inline formatting ***************************/

	sup {
		vertical-align: super;
		font-size: 80%;
	}

/******************************************************************************/
/*                                    Code                                    */
/******************************************************************************/

/** General monospace/pre rules ***********************************************/

	pre, code, samp {
		font-family: Menlo, Consolas, "DejaVu Sans Mono", Monaco, monospace;
		font-size: .9em;
		hyphens: none;
		text-transform: none;
		text-align: left;
		text-align: start;
		font-variant: normal;
		orphans: 3;
		widows: 3;
		page-break-before: avoid;
	}
	pre code,
	code code {
		font-size: 100%;
	}

	pre {
		margin-top: 1em;
		margin-bottom: 1em;
		overflow: auto;
	}

/** Inline Code fragments *****************************************************/

  /* Do something nice. */

/******************************************************************************/
/*                                    Links                                   */
/******************************************************************************/

/** General Hyperlinks ********************************************************/

	/* We hyperlink a lot, so make it less intrusive */
	a[href] {
		color: #034575;
		color: var(--a-normal-text);
		text-decoration-color: #707070;
		text-decoration-color: var(--a-normal-underline);
		text-decoration-skip-ink: none;
	}
	a:visited {
		color: #034575;
		color: var(--a-visited-text);
		text-decoration-color: #bbb;
		text-decoration-color: var(--a-visited-underline);
	}

	/* Indicate interaction with the link */
	a[href]:focus,
	a[href]:hover {
		text-decoration-thickness: 2px;
		text-decoration-skip-ink: none;
	}
	a[href]:active {
		color: #c00;
		color: var(--a-active-text);
		text-decoration-color: #c00;
		text-decoration-color: var(--a-active-underline);
	}

	/* Backout above styling for W3C logo */
	.head p:not(.copyright):first-child > a,
	.head > a:first-child {
		border: none;
		text-decoration: none;
		background: transparent;
	}

/******************************************************************************/
/*                                    Images                                  */
/******************************************************************************/

	img {
		border-style: none;
	}

	/* For autogen numbers, add
	   .caption::before, figcaption::before { content: "Figure " counter(figure) ". "; }
	*/

	figure, .figure, .sidefigure {
		page-break-inside: avoid;
		text-align: center;
		margin: 2.5em 0;
	}
	.figure img,    .sidefigure img,    figure img,
	.figure object, .sidefigure object, figure object,
        .figure svg,    .sidefigure svg,    figure svg {
		max-width: 100%;
		margin: auto;
		height: auto;
	}
	.figure pre, .sidefigure pre, figure pre {
		text-align: left;
		display: table;
		margin: 1em auto;
	}
	.figure table, figure table {
		margin: auto;
	}
	@media screen and (min-width: 20em) {
		.sidefigure {
			float: right;
			width: 50%;
			margin: 0 0 0.5em 0.5em;
		}
	}
	.caption, figcaption, caption {
		font-style: italic;
		font-size: 90%;
	}
	.caption::before, figcaption::before, figcaption > .marker {
		font-weight: bold;
	}
	.caption, figcaption {
		counter-increment: figure;
	}

	/* DL list is indented 2em, but figure inside it is not */
	dd > .figure, dd > figure { margin-left: -2em; }

/******************************************************************************/
/*                             Colored Boxes                                  */
/******************************************************************************/

	.issue, .note, .example, .advisement, blockquote,
	.amendment, .correction, .addition {
		padding: .5em;
		border: .5em;
		border-left-style: solid;
		page-break-inside: avoid;
		margin: 1em auto;
	}
	span.issue, span.note {
		padding: .1em .5em .15em;
		border-right-style: solid;
	}

	.note  > p:first-child,
	.issue > p:first-child,
	blockquote > :first-child,
	.amendment > p:first-child,
	.correction > p:first-child,
	.addition > p:first-child {
		margin-top: 0;
	}
	.note  > p:last-child,
	.issue > p:last-child,
	blockquote > :last-child,
	.amendment > p:last-child,
	.correction > p:last-child,
	.addition > p:last-child {
		margin-bottom: 0;
	}

	.issue::before, .issue > .marker,
	.example::before, .example > .marker,
	.note::before, .note > .marker,
	details.note > summary > .marker,
	.amendment::before, .amendment > .marker,
	details.amendment > summary > .marker,
	.correction::before, .correction > .marker,
	details.correction > summary > .marker,
	.addition::before, .addition > .marker,
	details.addition > summary > .marker {
		text-transform: uppercase;
		padding-right: 1em;
	}

	.example::before, .example > .marker {
		display: block;
		padding-right: 0em;
	}

/** Blockquotes ***************************************************************/

	blockquote {
		border-color: silver;
		border-color: var(--blockquote-border);
		background: var(--blockquote-bg);
		color: var(--blockquote-text);
	}

/** Open issue ****************************************************************/

	.issue {
		border-color: #e05252;
		border-color: var(--issue-border);
		background: #fbe9e9;
		background: var(--issue-bg);
		color: black;
		color: var(--issue-text);
		counter-increment: issue;
		overflow: auto;
	}
	.issue::before, .issue > .marker {
		color: #831616;
		color: var(--issueheading-text);
	}
	/* Add .issue::before { content: "Issue " counter(issue) " "; } for autogen numbers,
	   or use class="marker" to mark up the issue number in source. */

/** Example *******************************************************************/

	.example {
		border-color: #e0cb52;
		border-color: var(--example-border);
		background: #fcfaee;
		background: var(--example-bg);
		color: black;
		color: var(--example-text);
		counter-increment: example;
		overflow: auto;
		clear: both;
	}
	.example::before, .example > .marker {
		color: #574b0f;
		color: var(--exampleheading-text);
	}
	/* Add .example::before { content: "Example " counter(example) " "; } for autogen numbers,
	   or use class="marker" to mark up the example number in source. */

/** Non-normative Note ********************************************************/

	.note {
		border-color: #52e052;
		border-color: var(--note-border);
		background: #e9fbe9;
		background: var(--note-bg);
		color: black;
		color: var(--note-text);
		overflow: auto;
	}

	.note::before, .note > .marker,
	details.note > summary {
		color: hsl(120, 70%, 22%);
		color: var(--noteheading-text);
	}
	/* Add .note::before { content: "Note "; } for autogen label,
	   or use class="marker" to mark up the label in source. */

	details.note[open] > summary {
		border-bottom: 1px silver solid;
		border-bottom: 1px var(--notesummary-underline) solid;
	}

/** Advisement Box ************************************************************/
	/*  for attention-grabbing normative statements */

	.advisement {
		border-color: orange;
		border-color: var(--advisement-border);
		border-style: none solid;
		background: #fec;
		background: var(--advisement-bg);
		color: black;
		color: var(--advisement-text);
	}
	strong.advisement {
		display: block;
		text-align: center;
	}
	.advisement::before, .advisement > .marker {
		color: #b35f00;
		color: var(--advisementheading-text);
	}

/** Amendment Box *************************************************************/

	.amendment, .correction, .addition {
		border-color: #330099;
		border-color: var(--amendment-border);
		background: #F5F0FF;
		background: var(--amendment-bg);
	}
	.amendment.proposed, .correction.proposed, .addition.proposed {
		border-style: solid;
		border-block-width: 0.25em;
	}
	.amendment::before, .amendment > .marker,
	details.amendment > summary::before, details.amendment > summary > .marker,
	.correction::before, .correction > .marker,
	details.correction > summary::before, details.correction > summary > .marker,
	.addition::before, .addition > .marker,
	details.addition > summary::before, details.addition > summary > .marker {
		color: #220066;
		color: var(--amendmentheading-text);
	}
	.amendment.proposed::before, .amendment.proposed > .marker,
	details.amendment.proposed > summary::before, details.amendment.proposed > summary > .marker,
	.correction.proposed::before, .correction.proposed > .marker,
	details.correction.proposed > summary::before, details.correction.proposed > summary > .marker,
	.addition.proposed::before, .addition.proposed > .marker,
	details.addition.proposed > summary::before, details.addition.proposed > summary > .marker {
		font-weight: bold;
	}

/** Spec Obsoletion Notice ****************************************************/
	/* obnoxious obsoletion notice for older/abandoned specs. */

	details:not([hidden]) {
		display: block;
	}
	summary {
		font-weight: bolder;
	}

	.annoying-warning:not(details),
	details.annoying-warning:not([open]) > summary,
	details.annoying-warning[open] {
		background: hsla(40,100%,50%,0.95);
		background: var(--warning-bg);
		color: black;
		color: var(--warning-text);
		padding: .75em 1em;
		border: red;
		border: var(--warning-border);
		border-style: solid none;
		box-shadow: 0 2px 8px black;
		text-align: center;
	}
	.annoying-warning :last-child {
		margin-bottom: 0;
	}

@media not print {
	details.annoying-warning[open] {
		position: fixed;
		left: 0;
		right: 0;
		bottom: 2em;
		z-index: 1000;
	}
}

	details.annoying-warning:not([open]) > summary {
		text-align: center;
	}

/** Entity Definition Boxes ***************************************************/

	.def {
		padding: .5em 1em;
		background: #def;
		background: var(--def-bg);
		margin: 1.2em 0;
		border-left: 0.5em solid #8ccbf2;
		border-left: 0.5em solid var(--def-border);
		color: black;
		color: var(--def-text);
	}

/******************************************************************************/
/*                                    Tables                                  */
/******************************************************************************/

	th, td {
		text-align: left;
		text-align: start;
	}

/** Property/Descriptor Definition Tables *************************************/

	table.def {
		/* inherits .def box styling, see above */
		width: 100%;
		border-spacing: 0;
	}

	table.def td,
	table.def th {
		padding: 0.5em;
		vertical-align: baseline;
		border-bottom: 1px solid #bbd7e9;
		border-bottom: 1px solid var(--defrow-border);
	}

	table.def > tbody > tr:last-child th,
	table.def > tbody > tr:last-child td {
		border-bottom: 0;
	}

	table.def th {
		font-style: italic;
		font-weight: normal;
		padding-left: 1em;
		width: 3em;
	}

	/* For when values are extra-complex and need formatting for readability */
	table td.pre {
		white-space: pre-wrap;
	}

	/* A footnote at the bottom of a def table */
	table.def td.footnote {
		padding-top: 0.6em;
	}
	table.def td.footnote::before {
		content: " ";
		display: block;
		height: 0.6em;
		width: 4em;
		border-top: thin solid;
	}

/** Data tables (and properly marked-up index tables) *************************/
	/*
		 <table class="data"> highlights structural relationships in a table
		 when correct markup is used (e.g. thead/tbody, th vs. td, scope attribute)

		 Use class="complex data" for particularly complicated tables --
		 (This will draw more lines: busier, but clearer.)

		 Use class="long" on table cells with paragraph-like contents
		 (This will adjust text alignment accordingly.)
		 Alternately use class="longlastcol" on tables, to have the last column assume "long".
	*/

	table {
		word-wrap: normal;
		overflow-wrap: normal;
		hyphens: manual;
	}

	table.data,
	table.index {
		margin: 1em auto;
		border-collapse: collapse;
		border: hidden;
		width: 100%;
	}
	table.data caption,
	table.index caption {
		max-width: 50em;
		margin: 0 auto 1em;
	}

	table.data td,  table.data th,
	table.index td, table.index th {
		padding: 0.5em 1em;
		border-width: 1px;
		border-color: silver;
		border-color: var(--datacell-border);
		border-top-style: solid;
	}

	table.data thead td:empty {
		padding: 0;
		border: 0;
	}

	table.data  thead,
	table.index thead,
	table.data  tbody,
	table.index tbody {
		border-bottom: 2px solid;
	}

	table.data colgroup,
	table.index colgroup {
		border-left: 2px solid;
	}

	table.data  tbody th:first-child,
	table.index tbody th:first-child  {
		border-right: 2px solid;
		border-top: 1px solid silver;
		border-top: 1px solid var(--datacell-border);
		padding-right: 1em;
	}

	table.data th[colspan],
	table.data td[colspan] {
		text-align: center;
	}

	table.complex.data th,
	table.complex.data td {
		border: 1px solid silver;
		border: 1px solid var(--datacell-border);
		text-align: center;
	}

	table.data.longlastcol td:last-child,
	table.data td.long {
	 vertical-align: baseline;
	 text-align: left;
	}

	table.data img {
		vertical-align: middle;
	}


/*
Alternate table alignment rules

	table.data,
	table.index {
		text-align: center;
	}

	table.data  thead th[scope="row"],
	table.index thead th[scope="row"] {
		text-align: right;
	}

	table.data  tbody th:first-child,
	table.index tbody th:first-child  {
		text-align: right;
	}

Possible extra rowspan handling

	table.data  tbody th[rowspan]:not([rowspan='1']),
	table.index tbody th[rowspan]:not([rowspan='1']),
	table.data  tbody td[rowspan]:not([rowspan='1']),
	table.index tbody td[rowspan]:not([rowspan='1']) {
		border-left: 1px solid silver;
	}

	table.data  tbody th[rowspan]:first-child,
	table.index tbody th[rowspan]:first-child,
	table.data  tbody td[rowspan]:first-child,
	table.index tbody td[rowspan]:first-child{
		border-left: 0;
		border-right: 1px solid silver;
	}
*/

/******************************************************************************/
/*                                  Indices                                   */
/******************************************************************************/


/** Table of Contents *********************************************************/

	.toc a {
		color: black;
		color: var(--toclink-text);
		/* More spacing; use padding to make it part of the click target. */
		padding: 0.1rem 1px 0;
		/* Larger, more consistently-sized click target */
		display: block;
		/* Switch to using border-bottom */
		text-decoration: none;
		border-bottom: 3px solid transparent;
		margin-bottom: -2px;
	}
	.toc a:visited {
		color: black;
		color: var(--toclink-visited-text);
	}
	.toc a:focus,
	.toc a:hover {
		background: #f8f8f8;
		background: rgba(75%, 75%, 75%, .25);
		background: var(--a-hover-bg);
		border-bottom-color: #3980b5;
		border-bottom-color: var(--toclink-underline);
	}
	.toc a:visited:focus,
	.toc a:visited:hover {
		border-bottom-color: #054572;
		border-bottom-color: var(--toclink-visited-underline);
	}

	.toc, .toc ol, .toc ul, .toc li {
		list-style: none; /* Numbers must be inlined into source */
		/* because generated content isn't search/selectable and markers can't do multilevel yet */
		margin:  0;
		padding: 0;
	}
	.toc {
		line-height: 1.1em; /* consistent spacing */
	}

	/* ToC not indented until third level, but font style & margins show hierarchy */
	.toc > li             { font-weight: bold;   }
	.toc > li li          { font-weight: normal; }
	.toc > li li li       { font-size:   95%;    }
	.toc > li li li li    { font-size:   90%;    }
	.toc > li li li li li { font-size:   85%;    }

	.toc > li             { margin: 1.5rem 0;    }
	.toc > li li          { margin: 0.3rem 0;    }
	.toc > li li li       { margin-left: 2rem;   }

	/* Section numbers in a column of their own */
	.toc .secno {
		float: left;
		width: 4rem;
		white-space: nowrap;
	}
	.toc > li li li li .secno {
		font-size: 85%;
	}
	.toc > li li li li li .secno {
		font-size: 100%;
	}

	:not(li) > .toc              { margin-left:  5rem; }
	.toc .secno                  { margin-left: -5rem; }
	.toc > li li li .secno       { margin-left: -7rem; }
	.toc > li li li li .secno    { margin-left: -9rem; }
	.toc > li li li li li .secno { margin-left: -11rem; }

	/* Tighten up indentation in narrow ToCs */
	@media (max-width: 30em) {
		:not(li) > .toc              { margin-left:  4rem; }
		.toc .secno                  { margin-left: -4rem; }
		.toc > li li li              { margin-left:  1rem; }
		.toc > li li li .secno       { margin-left: -5rem; }
		.toc > li li li li .secno    { margin-left: -6rem; }
		.toc > li li li li li .secno { margin-left: -7rem; }
	}
	@media screen and (min-width: 78em) {
		body:not(.toc-inline) :not(li) > .toc              { margin-left:  4rem; }
		body:not(.toc-inline) .toc .secno                  { margin-left: -4rem; }
		body:not(.toc-inline) .toc > li li li              { margin-left:  1rem; }
		body:not(.toc-inline) .toc > li li li .secno       { margin-left: -5rem; }
		body:not(.toc-inline) .toc > li li li li .secno    { margin-left: -6rem; }
		body:not(.toc-inline) .toc > li li li li li .secno { margin-left: -7rem; }
	}
	body.toc-sidebar #toc :not(li) > .toc              { margin-left:  4rem; }
	body.toc-sidebar #toc .toc .secno                  { margin-left: -4rem; }
	body.toc-sidebar #toc .toc > li li li              { margin-left:  1rem; }
	body.toc-sidebar #toc .toc > li li li .secno       { margin-left: -5rem; }
	body.toc-sidebar #toc .toc > li li li li .secno    { margin-left: -6rem; }
	body.toc-sidebar #toc .toc > li li li li li .secno { margin-left: -7rem; }

	.toc li {

		clear: both;
	}


/** Index *********************************************************************/

	/* Index Lists: Layout */
	ul.index       { margin-left: 0; columns: 15em; text-indent: 1em hanging; }
	ul.index li    { margin-left: 0; list-style: none; break-inside: avoid; }
	ul.index li li { margin-left: 1em; }
	ul.index dl    { margin-top: 0; }
	ul.index dt    { margin: .2em 0 .2em 20px;}
	ul.index dd    { margin: .2em 0 .2em 40px;}
	/* Index Lists: Typography */
	ul.index ul,
	ul.index dl { font-size: smaller; }
	@media not print {
		ul.index li a + span {
			white-space: nowrap;
			color: transparent;
		}
		ul.index li a:hover + span,
		ul.index li a:focus + span {
			color: #707070;
			color: var(--indexinfo-text);
		}
	}

/** Index Tables *****************************************************/
	/* See also the data table styling section, which this effectively subclasses */

	table.index {
		font-size: small;
		border-collapse: collapse;
		border-spacing: 0;
		text-align: left;
		margin: 1em 0;
	}

	table.index td,
	table.index th {
		padding: 0.4em;
	}

	table.index tr:hover td:not([rowspan]),
	table.index tr:hover th:not([rowspan]) {
		color: black;
		color: var(--indextable-hover-text);
		background: #f7f8f9;
		background: var(--indextable-hover-bg);
	}

	/* The link in the first column in the property table (formerly a TD) */
	table.index th:first-child a {
		font-weight: bold;
	}

/** Unicode characters and character sequences *******************************/

	.codepoint bdi {
		line-height: 1em;
		font-size: 1.25em;
		padding-inline: 0.25em;
	}
	
	.codepoint img {
		height: 2em;
		margin-inline: 0.25em;
		vertical-align: bottom;
	}

	.uname {
		font-family: Arial, monospace;
		font-size: 0.75em;                    
		letter-spacing: 0.03em;
		color: brown;
	}

/** Outdated warning **********************************************************/

.outdated-spec {
	color: black;
	color: var(--outdatedspec-text);
	background-color: rgba(0,0,0,0.5);
	background-color: var(--outdatedspec-bg);
}

.outdated-warning {
	position: fixed;
	bottom: 50%;
	left: 0;
	right: 0;
	margin: 0 auto;
	width: 50%;
	background: maroon;
	background: var(--outdated-bg);
	color: white;
	color: var(--outdated-text);
	border-radius: 1em;
	box-shadow: 0 0 1em red;
	box-shadow: 0 0 1em var(--outdated-shadow);
	padding: 2em;
	text-align: center;
	z-index: 2;
}

.outdated-warning a {
	color: currentcolor;
	background: transparent;
}

.edited-rec-warning {
	background: darkorange;
	background: var(--editedrec-bg);
	box-shadow: 0 0 1em;
}

.outdated-warning button {
	position: absolute;
	top: 0;
	right:0;
	margin: 0;
	border: 0;
	padding: 0.25em 0.5em;
	background: transparent;
	color: white;
	color: var(--outdated-text);
	font:1em sans-serif;
	text-align:center;
}

.outdated-warning span {
	display: block;
}

.outdated-collapsed {
	bottom: 0;
	border-radius: 0;
	width: 100%;
	padding: 0;
}

/******************************************************************************/
/*                                    Print                                   */
/******************************************************************************/

	@media print {
		/* Pages have their own margins. */
		html {
			margin: 0;
		}
		/* Serif for print. */
		body {
			font-family: serif;
		}

		.outdated-warning {
			position: absolute;
			border-style: solid;
			border-color: red;
		}

		.outdated-warning input {
			display: none;
		}
	}
	@page {
		margin: 1.5cm 1.1cm;
	}

/******************************************************************************/
/*                                    Legacy                                  */
/******************************************************************************/

	/* This rule is inherited from past style sheets. No idea what it's for. */
	.hide { display: none; }



/******************************************************************************/
/*                             Overflow Control                               */
/******************************************************************************/

	.figure .caption, .sidefigure .caption, figcaption {
		/* in case figure is overlarge, limit caption to 50em */
		max-width: 50rem;
		margin-left: auto;
		margin-right: auto;
	}
	.overlarge {
		/* Magic to create good item positioning:
		   "content column" is 50ems wide at max; less on smaller screens.
		   Extra space (after ToC + content) is empty on the right.

		   1. When item < content column, centers item in column.
		   2. When content < item < available, left-aligns.
		   3. When item > available, fills available and is scrollable.
		*/
		display: grid;
		grid-template-columns: minmax(0, 50em);
	}
	.overlarge > table {
		/* limit preferred width of table */
		max-width: 50em;
		margin-left: auto;
		margin-right: auto;
	}

	@media (min-width: 55em) {
		.overlarge {
			margin-right: calc(13px + 26.5rem - 50vw);
			max-width: none;
		}
	}
	@media screen and (min-width: 78em) {
		body:not(.toc-inline) .overlarge {
			/* 30.5em body padding 50em content area */
			margin-right: calc(40em - 50vw) !important;
		}
	}
	@media screen and (min-width: 90em) {
		body:not(.toc-inline) .overlarge {
			/* 4em html margin 30.5em body padding 50em content area */
			margin-right: calc(84.5em - 100vw) !important;
		}
	}

	@media not print {
		.overlarge {
			overflow-x: auto;
			/* See Lea Verou's explanation background-attachment:
			 * http://lea.verou.me/2012/04/background-attachment-local/
			 *
			background: top left  / 4em 100% linear-gradient(to right,  #ffffff, rgba(255, 255, 255, 0)) local,
			            top right / 4em 100% linear-gradient(to left, #ffffff, rgba(255, 255, 255, 0)) local,
			            top left  / 1em 100% linear-gradient(to right,  #c3c3c5, rgba(195, 195, 197, 0)) scroll,
			            top right / 1em 100% linear-gradient(to left, #c3c3c5, rgba(195, 195, 197, 0)) scroll,
			            white;
			background-repeat: no-repeat;
			*/
		}
	}

/******************************************************************************/
/*                             Dark mode toggle                               */
/******************************************************************************/

	#toc-theme-toggle input {
		position: absolute;
		clip: rect(1px, 1px, 1px, 1px);
		clip-path: inset(0px 0px 99.9% 99.9%);
		overflow: hidden;
		height: 1px;
		width: 1px;
		padding: 0;
		border: 0;
	}

	#toc-theme-toggle img {
		background-color: transparent;
        }

	#toc-theme-toggle span {
		padding: 5px;
		border-radius: 30px;
	}

	#toc-theme-toggle input:checked + span {
		background-color: var(--logo-bg);
		color: var(--logo-text);
		padding: 3px 10px;
	}

	@media (prefers-reduced-motion: reduce) {
		body.toc-sidebar #toc {
			position: absolute;
			overflow: initial;
			bottom: unset;
		}
	}

</style>
<!--  /recaptcha  -->
<script src="https://www.google.com/recaptcha/api.js?render=6Ld-o6slAAAAAHqK6lboUnsLN3_1KlHccGGDGT1n"></script>
<script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6Ld-o6slAAAAAHqK6lboUnsLN3_1KlHccGGDGT1n', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script> 
</head>
<body class="h-entry toc-inline">
<!-- 
<span id="Community%20Science"></span>
<span id="Crowdsourcing%20Citizen%20Science"></span>
<span id="Object%20of%20study"></span>
<span id="Philosophical%20Background"></span>
<span id="Formal%20Background"></span>
<span id="Specific%20Background"></span>
<span id="Accumulated%20Background"></span>
<span id="Problematic"></span>
<span id="Objective"></span>
<span id="Methodical"></span>
<span id="Results"></span>
<span id="Conclusion"></span>
<span id="authorship"></span>
<span id="abstract"></span>
 -->
  <p id="toc-nav"><a id="toc-jump" href="#toc"><span aria-hidden="true">↑</span> <span>Back to top</span></a></p>
  
  <div class="head" id="toc">
    <p data-fill-with="logo" ><a href="https://www.cyta.com.ar/" title="Editorial CyTA - Ciencia y Técnica Avanzada" target="_blank" class="logo"> <span style="color: #009; font-family: 'Times New Roman';"> C</span><em><span style="color: #F60; font-family: 'Times New Roman';">y</span></em><span style="color: #009; font-family: 'Times New Roman';">TA</span> </a> </p>  
    <p class="property" id="subtitle"><a href="https://www.cyta.com.ar/" title="Editorial Cienia y Técnica Avanzada" target="_blank" class="hljs-title" >Ciencia y Técnica Avanzada</a></p>
    <hr title="Separator for header">
<details>
<summary>Índice</summary>
    <div data-fill-with="spec-metadata">
<ul>
<li><a href="#authorship"> Authorship</a></li>
<li><a href="#abstract"> Abstract</a></li>
<li><a href="#keywords"> keywords</a></li>
<li><a href="#text"> Text</a></li>
<li><a href="#references"> References</a></li>
<li><a href="#index"> Google Scholar Index</a></li>
<li><a href="#edited"> Edited by</a></li>

<li><button class="g-recaptcha" 
        data-sitekey="6Ld-o6slAAAAAHqK6lboUnsLN3_1KlHccGGDGT1n
" 
onclick="window.print()"
        data-callback='onSubmit' 
        data-action='submit'>Print PDF</button></li>
				</ul>
    </div>
</details>
    
    <hr title="Separator for header">
  </div>
  
    <div vocab="https://schema.org/" typeof="ScholarlyArticle" resource="#article">
<?php
echo ("<main vocab='https://schema.org/' typeof='ScholarlyArticle' about='http://www.cyta.com.ar/ta/article.php?id=".$row['identifier']."' resource='#article'>");
echo ("<article>");
echo "<p class='type'> <b>" .$row['type']."</b></p>";
echo "<h1> <span property='name'>" .$row['title']."</span> </h1>";
echo "<h1> <span property='name'>" .$row['title_en']."</span> </h1>";
echo "<span id='authorship' property='author'></span>";
          $sql2= ("SELECT `contribution_creator`.`creator`,`contribution_creator`.`Id_autor`, `contribution_creator`.`provenance`, `creator`.`Id_autor`, `creator`.`filiacion`, `creator`.`email` FROM `contribution_creator`,`creator` WHERE `identifier`=".$id." and `contribution_creator`.`Id_autor` = `creator`.`Id_autor` ORDER BY `sort` ASC"."");
$result2 = mysqli_query ($conexion, $sql2) or die( mysqli_error($conexion));
//Warning:  
if ($row2 = mysqli_fetch_array($result2)){
do {
echo "<address>";
//echo "<p>";
echo "<p><span vocab='https://schema.org/' typeof='ScholarlyArticle' about='https://www.cyta.com.ar/ta/creator_ficha.php?id=".$row2['Id_autor']."' property='author' >
<a title='Ver Ficha del Autor: email, ORCID, otras publicaciones' target='_blank' href='"."creator_ficha.php?id=".$row2['Id_autor']."'> ". $row2['creator']." &#x24D8;</a></span>";
echo "<br> <span property='sourceOrganization'> ";
$cadena = $row2['provenance'];
echo nl2br($cadena);
//echo"<br>";
//echo ("<a title='Enviar un correo al Autor' href=mailto:".$row2['email'].">"." \n");
//echo ($row2['email']);
//echo "</a>";
echo"</span></p>";
echo "</address>";
}
while ($row2 = mysqli_fetch_array($result2));
//echo "</p>";
echo "<h2 id='abstract'>Resumen</h2>";
echo "<p> <span property='abstract'>".$row['description']."</span> </p>";
echo "<h2>Abstract</h2>";
echo "<p> <span property='abstract'>".$row['description_en']."</span> </p>";
echo ("<div id='keywords'>");
echo "<h2>Palabras Clave:</h2>";
// Construcción de los términos con comillas manuales y reemplazo de espacios por "+"
$searchQuery = '"' . $row['subject_1'] . '" "' . $row['subject_2'] . '" "' . $row['subject_3'] . '"';
$searchQuery = str_replace(' ', '+', $searchQuery); // Reemplaza espacios por "+"
// Generación del enlace con la consulta corregida
echo "<p> <span property='keywords'>".$row['subject_1'].", ".$row['subject_2'].", ".$row['subject_3']." 
<a title='Buscar trabajos en el campo disciplinar' target='_blank' href='https://scholar.google.com.ar/scholar?hl=es&as_sdt=0,5&q=".
$searchQuery."'>  &#x24D8;</a></span> </p>";

echo "<h2>Keyword:</h2>";
$searchQuery = '"' . $row['subject_6'] . '" "' . $row['subject_7'] . '" "' . $row['subject_8'] . '"';
$searchQuery = str_replace(' ', '+', $searchQuery); // Reemplaza espacios por "+"
// Generación del enlace con la consulta corregida
echo "<p> <span property='keywords'>".$row['subject_6'].", ".$row['subject_7'].", ".$row['subject_8']." 
<a title='Buscar trabajos en el campo disciplinar' target='_blank' href='https://scholar.google.com.ar/scholar?hl=es&as_sdt=0,5&q=".
$searchQuery."'>  &#x24D8;</a></span> - 
<a title='Buscar en ERIC - Education Resources Information Center del Institute Education of Sciences' target='_blank' href='https://eric.ed.gov/?q=".$row['subject_6']."+".$row['subject_7']."+".$row['subject_8']."'>  &#x24D8;</a>
 - <a title='Buscar en CORE - COnnecting REpositories' target='_blank' href='https://core.ac.uk/search/?q=".$row['subject_6']."+".$row['subject_7']."+".$row['subject_8']."+AND+documentType%3A%22research%22&page=1'>  &#x24D8;</a>
</p>";
echo ("</div>");
} else {
echo "No se encontró al autor en la base de datos";
}  
?>
<?php 
echo "<a id='text'></a>";
  $content= "SELECT 
  `content`,
  `title_buscador`
   FROM `contribution` WHERE `identifier`=".$id.";";
          $result_content=mysqli_query($conexion, $content) or die( mysqli_error($conexion));
          $row_content= mysqli_fetch_array($result_content);
echo ($row_content["content"]);
	echo "<a id='references'></a>";
	echo "<h2>Bibliograf&iacute;a - Bibliography</h2>";
                   $sql2= "SELECT `source_buscador`,`source` FROM `bibliography` WHERE `identifier`=".$id.";";
          $row2= mysqli_fetch_array($result2);
if(isset($$_GET['id'])) $id = $_GET['id'];
$result2 = mysqli_query ($conexion, "SELECT `source`, `source_buscador` FROM `bibliography` WHERE `identifier`=".$id."") or die( mysqli_error($conexion));
if ($row2 = mysqli_fetch_array($result2)){
do {
echo ("<p><span property='citation'><a title='Buscar referencias en Google Scholar' target='_blank' href='https://scholar.google.com.ar/scholar?hl=es&as_sdt=0%2C5&q=".$row2["source_buscador"]."'>".$row2["source"]."</a></span></p>");
} while ($row2 = mysqli_fetch_array($result2));
} else {
echo "No se encontró al autor en la base de datos";
};
echo "<hr class='line'>";
echo "<h2 id='index'>" ."Google Scholar Index"."</h2>";
echo "<blockquote>";
echo "<h3>" ."Article"."</h3>";
echo ("<p>"."<a title='Google Scholar Index' target='_blank' href='https://scholar.google.com.ar/scholar?hl=es&as_sdt=0%2C5&q=".$row_content['title_buscador']."'>".$row['title']."</a>"."</p>");
echo "<h3>" ."Publisher: "."</h3>";
echo ("<p> <span itemscope itemtype='https://schema.org/Periodical' itemid='#periodical'> <span property='name'>"."<a title='Google Scholar Index - Publisher' target='_blank'  href='https://scholar.google.com/citations?user=pI9Aj0oAAAAJ&hl=es"."' >"."Ciencia y Técnica Administrativa - CyTA"."</a>"."</span> </span> </p>");
echo ("</blockquote>");
echo ("</article>");
echo ("</main>");

  ?>
    </div>
    
  <?php
 $ficha= "SELECT 
 `title`,
`identifier`,
`source`,
`date`,
`issue`,
SUBSTRING(`identifier` , 1 , 2 ), 
SUBSTRING(`identifier` , 4 , 1 ), 
SUBSTRING(`identifier` , 6 , 1 ), 
SUBSTRING(`date` , 1 , 4 ) ,
`contributor`
 FROM `dc` 
 WHERE `identifier`=".$id.";";
           $result_ficha=mysqli_query($conexion, $ficha) or die( mysqli_error($conexion));
          $row_ficha= mysqli_fetch_array($result_ficha);
echo "<h2 id='edited'>" ."Version of Record - VoR"."</h2>";
echo "<blockquote> ";
echo "<p>
<b>Publisher: </b> 
<span itemscope itemtype='https://schema.org/Periodical' itemid='#periodical'>
<span itemprop='publisher'>
<a target='_blank' HREF='https://www.cyta.com.ar/'> CyTA </a>
</span></span>
</p>";

echo "<p><b>Date of publisher: </b> 
<span itemscope itemtype='https://schema.org/PublicationVolume'>
	<link itemprop='isPartOf' href='#periodical' >
	<span itemprop='datePublished'>" .$row_ficha['date']."
	</span></span></p>";
echo "<p><b>URL: </b>"."<a title='Ver el artículo' target='_blank' href='"."https://".$row_ficha['source']."'> ". $row_ficha['source']."</a></p>";
echo "<p><b>License: </b>"."<a target='_blank' href=https://creativecommons.org/licenses/by-nc-sa/4.0/#>"."Atribución 4.0 - Internacional (CC BY 4.0)"."</a>"."</p> \n";
echo "<p><b>&copy;
</b>"."<a target='_blank' href=https://www.cyta.com.ar/ta/cyta_copyright.php>"."Ciencia y Técnica Administrativa"."</a>"."</p> \n";

echo "</blockquote>";
echo "<hr>";
//citar el artículo

echo "<h3>Cita de la monografía</h3> ";
echo "<div itemscope itemtype='https://schema.org/ScholarlyArticle'> ";
echo "<span itemprop='author'>" .$row['creator_1']."; ".$row['creator_2']."; ".$row['creator_3']."</span> ";
echo "(".$row_ficha["SUBSTRING(`date` , 1 , 4 )"].").";
echo " <span itemprop='name'>" .$row['title']."</span>.";

echo " <span itemprop='isPartOf' itemscope itemtype='https://schema.org/Periodical'>
<span itemprop='name'>
<i>Ciencia y Técnica Administrativa. </i></span></span>";

echo "https://".$row_ficha['source']."";
echo "</div> ";



?>

<?php
//echo ("");
//echo "ISSUE: ".$row_ficha['issue']."</p>";
echo "<hr>";
//Compartir por redes sociales
echo "<h3>Compartir en redes sociales</h3>";
//echo ("");
//echo ("<metaname=".'"twitter:url'.'"'. " content=".'"hhtp://'.$row['source'].'"'."> \n");
//<!-- Facebook --> 
echo ("");
echo ("<p>"."<a href='https://www.facebook.com/sharer/sharer.php?u=https://".$row["source"]."' target='_blank' rel='noopener' aria-label='Share on Facebook' title='Share by Facebook'><i class='fab fa-facebook-f fa-2x'><!-- fab -->Facebook</i> </a>"."/");
//<!-- twitter --> 
echo (" "."<a href='https://twitter.com/intent/tweet?text=".$row["title"]."&amp;url=http%3A//".$row["source"]."' target='_blank' rel='noopener' aria-label='Share on Twitter' title='Share by Twitter'><!-- fab -->Twitter </a>"."/");
//<!-- wassap --> 
echo (" "."<a href='https://api.whatsapp.com/send?text=CyTA; Artículo: ".$row["title"]."%20https://".$row["source"]."' target='_blank'><!-- fab -->Whatsapp </a>"."/");
//<!-- Linkedln --> 
echo (" "."<a href='https://www.linkedin.com/sharing/share-offsite/?url=https://".$row["source"]."' target='_blank'><!-- fab -->Linkedln </a>"."/");
	  	mysqli_close($conexion);
             ?>
             


  <hr>
  <blockquote>
    <p class="note2">To send <strong>monograph</strong>, send it to the email: <strong>editorialcyta@gmail.com</strong> or cyta@cyta.ar</p>
    <p> <span class="note"><strong>Identify</strong> it, in the subject field, with the word:<strong>Monograph</strong></span></p>
    <p class="note"> In the <strong>body</strong> of the email, indicate the following information for each of the <strong>authors, name to be quoted, filiation, and   email.</strong></p>
  </blockquote> 
  <hr>
  <p><strong>CyTA</strong> se encuentra <em>indexada</em> en los siguientes directorios de publicaciones científicas:<a href="https://scholar.google.com/citations?user=pI9Aj0oAAAAJ&hl=es" target="_blank" title="Scholar Google"> </a><a href="https://explore.openaire.eu/search/advanced/dataproviders?f0=relorganizationid&fv0=pending_org_::5727a6d8eedfd7128248f590a841a571" title="OpenAIRE Graph es un gráfico de conocimiento académico (SKG) de acceso abierto resultante de la agregación de registros de metadatos de entidades de investigación para monitorear, descubrir y navegar por el registro científico abierto" target="_blank">OpenAIRE</a>, <a href="https://v2.sherpa.ac.uk/id/repository/10605" title="Jisc es la agencia digital, de datos y de tecnología del Reino Unido centrada en la educación terciaria, la investigación y la innovación" target="_blank">Jisc</a>, <a href="http://bibpurl.oclc.org/maint/display.pl.cgi?noedit=on&purl=/web/69501&id=nobody&cookie=" target="_blank">Servicio PURL bibliográfico de OCLC</a>, <a href="https://search.worldcat.org/es/title/233216288" target="_blank">WorldCat</a>, <a href="https://zdb-katalog.de/title.xhtml?idn=985007141&view=full" target="_blank">Biblioteca Nacional Alemana</a>, <a href="https://scholar.google.com/citations?user=pI9Aj0oAAAAJ&hl=es" target="_blank">Google Scholar</a> entre otros.</p>
  
  <button class="g-recaptcha" data-sitekey="6Ld-o6slAAAAAHqK6lboUnsLN3_1KlHccGGDGT1n" onclick="window.print()" data-callback='onSubmit' data-action='submit'>Print PDF</button>
<script id="respec-dfn-panel">(() => {
// @ts-check
if (document.respec) {
  document.respec.ready.then(setupPanel);
} else {
  setupPanel();
}

function setupPanel() {
  const listener = panelListener();
  document.body.addEventListener("keydown", listener);
  document.body.addEventListener("click", listener);
}

function panelListener() {
  /** @type {HTMLElement} */
  let panel = null;
  return event => {
    const { target, type } = event;

    if (!(target instanceof HTMLElement)) return;

    // For keys, we only care about Enter key to activate the panel
    // otherwise it's activated via a click.
    if (type === "keydown" && event.key !== "Enter") return;

    const action = deriveAction(event);

    switch (action) {
      case "show": {
        hidePanel(panel);
        /** @type {HTMLElement} */
        const dfn = target.closest("dfn, .index-term");
        panel = document.getElementById(`dfn-panel-for-${dfn.id}`);
        const coords = deriveCoordinates(event);
        displayPanel(dfn, panel, coords);
        break;
      }
      case "dock": {
        panel.style.left = null;
        panel.style.top = null;
        panel.classList.add("docked");
        break;
      }
      case "hide": {
        hidePanel(panel);
        panel = null;
        break;
      }
    }
  };
}

/**
 * @param {MouseEvent|KeyboardEvent} event
 */
function deriveCoordinates(event) {
  const target = /** @type HTMLElement */ (event.target);

  // We prevent synthetic AT clicks from putting
  // the dialog in a weird place. The AT events sometimes
  // lack coordinates, so they have clientX/Y = 0
  const rect = target.getBoundingClientRect();
  if (
    event instanceof MouseEvent &&
    event.clientX >= rect.left &&
    event.clientY >= rect.top
  ) {
    // The event probably happened inside the bounding rect...
    return { x: event.clientX, y: event.clientY };
  }

  // Offset to the middle of the element
  const x = rect.x + rect.width / 2;
  // Placed at the bottom of the element
  const y = rect.y + rect.height;
  return { x, y };
}

/**
 * @param {Event} event
 */
function deriveAction(event) {
  const target = /** @type {HTMLElement} */ (event.target);
  const hitALink = !!target.closest("a");
  if (target.closest("dfn:not([data-cite]), .index-term")) {
    return hitALink ? "none" : "show";
  }
  if (target.closest(".dfn-panel")) {
    if (hitALink) {
      return target.classList.contains("self-link") ? "hide" : "dock";
    }
    const panel = target.closest(".dfn-panel");
    return panel.classList.contains("docked") ? "hide" : "none";
  }
  if (document.querySelector(".dfn-panel:not([hidden])")) {
    return "hide";
  }
  return "none";
}

/**
 * @param {HTMLElement} dfn
 * @param {HTMLElement} panel
 * @param {{ x: number, y: number }} clickPosition
 */
function displayPanel(dfn, panel, { x, y }) {
  panel.hidden = false;
  // distance (px) between edge of panel and the pointing triangle (caret)
  const MARGIN = 20;

  const dfnRects = dfn.getClientRects();
  // Find the `top` offset when the `dfn` can be spread across multiple lines
  let closestTop = 0;
  let minDiff = Infinity;
  for (const rect of dfnRects) {
    const { top, bottom } = rect;
    const diffFromClickY = Math.abs((top + bottom) / 2 - y);
    if (diffFromClickY < minDiff) {
      minDiff = diffFromClickY;
      closestTop = top;
    }
  }

  const top = window.scrollY + closestTop + dfnRects[0].height;
  const left = x - MARGIN;
  panel.style.left = `${left}px`;
  panel.style.top = `${top}px`;

  // Find if the panel is flowing out of the window
  const panelRect = panel.getBoundingClientRect();
  const SCREEN_WIDTH = Math.min(window.innerWidth, window.screen.width);
  if (panelRect.right > SCREEN_WIDTH) {
    const newLeft = Math.max(MARGIN, x + MARGIN - panelRect.width);
    const newCaretOffset = left - newLeft;
    panel.style.left = `${newLeft}px`;
    /** @type {HTMLElement} */
    const caret = panel.querySelector(".caret");
    caret.style.left = `${newCaretOffset}px`;
  }

  // As it's a dialog, we trap focus.
  // TODO: when <dialog> becomes a implemented, we should really
  // use that.
  trapFocus(panel, dfn);
}

/**
 * @param {HTMLElement} panel
 * @param {HTMLElement} dfn
 * @returns
 */
function trapFocus(panel, dfn) {
  /** @type NodeListOf<HTMLAnchorElement> elements */
  const anchors = panel.querySelectorAll("a[href]");
  // No need to trap focus
  if (!anchors.length) return;

  // Move focus to first anchor element
  const first = anchors.item(0);
  first.focus();

  const trapListener = createTrapListener(anchors, panel, dfn);
  panel.addEventListener("keydown", trapListener);

  // Hiding the panel releases the trap
  const mo = new MutationObserver(records => {
    const [record] = records;
    const target = /** @type HTMLElement */ (record.target);
    if (target.hidden) {
      panel.removeEventListener("keydown", trapListener);
      mo.disconnect();
    }
  });
  mo.observe(panel, { attributes: true, attributeFilter: ["hidden"] });
}

/**
 *
 * @param {NodeListOf<HTMLAnchorElement>} anchors
 * @param {HTMLElement} panel
 * @param {HTMLElement} dfn
 * @returns
 */
function createTrapListener(anchors, panel, dfn) {
  const lastIndex = anchors.length - 1;
  let currentIndex = 0;
  return event => {
    switch (event.key) {
      // Hitting "Tab" traps us in a nice loop around elements.
      case "Tab": {
        event.preventDefault();
        currentIndex += event.shiftKey ? -1 : +1;
        if (currentIndex < 0) {
          currentIndex = lastIndex;
        } else if (currentIndex > lastIndex) {
          currentIndex = 0;
        }
        anchors.item(currentIndex).focus();
        break;
      }

      // Hitting "Enter" on an anchor releases the trap.
      case "Enter":
        hidePanel(panel);
        break;

      // Hitting "Escape" returns focus to dfn.
      case "Escape":
        hidePanel(panel);
        dfn.focus();
        return;
    }
  };
}

/** @param {HTMLElement} panel */
function hidePanel(panel) {
  if (!panel) return;
  panel.hidden = true;
  panel.classList.remove("docked");
}
})()</script>
<script>
/******************************************************************************
 *                 JS Extension for the W3C Spec Style Sheet                  *
 *                                                                            *
 * This code handles:                                                         *
 * - some fixup to improve the table of contents                              *
 * - the obsolete warning on outdated specs                                   *
 ******************************************************************************/
(function() {
  "use strict";
  try {
    var details = document.querySelector("div.head details");
    details.addEventListener("toggle", function toggle() {
      window.localStorage.setItem("tr-metadata", details.open);
    }, false);
    details.open = !localStorage.getItem("tr-metadata") || localStorage.getItem("tr-metadata") === 'true';
  } catch (e) {}; // ignore errors for this interaction

  var ESCAPEKEY = 27;
  var collapseSidebarText = '<span aria-hidden="true">←</span> '
                          + '<span>Collapse Sidebar</span>';
  var expandSidebarText   = '<span aria-hidden="true">→</span> '
                          + '<span>Pop Out Sidebar</span>';
  var tocJumpText         = '<span aria-hidden="true">↑</span> '
                          + '<span>Jump to Table of Contents</span>';

  var sidebarMedia = window.matchMedia('screen and (min-width: 78em)');
  var autoToggle   = function(e){ toggleSidebar(e.matches) };
  if(sidebarMedia.addListener) {
    sidebarMedia.addListener(autoToggle);
  }

  function toggleSidebar(on, skipScroll) {
    if (on == undefined) {
      on = !document.body.classList.contains('toc-sidebar');
    }

    if (!skipScroll) {
      /* Don't scroll to compensate for the ToC if we're above it already. */
      var headY = 0;
      var head = document.querySelector('.head');
      if (head) {
        // terrible approx of "top of ToC"
        headY += head.offsetTop + head.offsetHeight;
      }
      skipScroll = window.scrollY < headY;
    }

    var toggle = document.getElementById('toc-toggle');
    var tocNav = document.getElementById('toc');
    if (on) {
      var tocHeight = tocNav.offsetHeight;
      document.body.classList.add('toc-sidebar');
      document.body.classList.remove('toc-inline');
      toggle.innerHTML = collapseSidebarText;
      if (!skipScroll) {
        window.scrollBy(0, 0 - tocHeight);
      }
      tocNav.focus();
      sidebarMedia.addListener(autoToggle); // auto-collapse when out of room
    }
    else {
      document.body.classList.add('toc-inline');
      document.body.classList.remove('toc-sidebar');
      toggle.innerHTML = expandSidebarText;
      if (!skipScroll) {
        window.scrollBy(0, tocNav.offsetHeight);
      }
      if (toggle.matches(':hover')) {
        /* Unfocus button when not using keyboard navigation,
           because I don't know where else to send the focus. */
        toggle.blur();
      }
    }
  }

  function createSidebarToggle() {
    /* Create the sidebar toggle in JS; it shouldn't exist when JS is off. */
    var toggle = document.createElement('a');
      /* This should probably be a button, but appearance isn't standards-track.*/
    toggle.id = 'toc-toggle';
    toggle.class = 'toc-toggle';
    toggle.href = '#toc';
    toggle.innerHTML = collapseSidebarText;

    sidebarMedia.addListener(autoToggle);
    var toggler = function(e) {
      e.preventDefault();
      sidebarMedia.removeListener(autoToggle); // persist explicit off states
      toggleSidebar();
      return false;
    }
    toggle.addEventListener('click', toggler, false);


    /* Get <nav id=toc-nav>, or make it if we don't have one. */
    var tocNav = document.getElementById('toc-nav');
    if (!tocNav) {
      tocNav = document.createElement('p');
      tocNav.id = 'toc-nav';
      /* Prepend for better keyboard navigation */
      document.body.insertBefore(tocNav, document.body.firstChild);
    }
    /* While we're at it, make sure we have a Jump to Toc link. */
    var tocJump = document.getElementById('toc-jump');
    if (!tocJump) {
      tocJump = document.createElement('a');
      tocJump.id = 'toc-jump';
      tocJump.href = '#toc';
      tocJump.innerHTML = tocJumpText;
      tocNav.appendChild(tocJump);
    }

    tocNav.appendChild(toggle);
  }

  var toc = document.getElementById('toc');
  if (toc) {
    if (!document.getElementById('toc-toggle')) {
      createSidebarToggle();
    }
    toggleSidebar(sidebarMedia.matches, true);

    /* If the sidebar has been manually opened and is currently overlaying the text
       (window too small for the MQ to add the margin to body),
       then auto-close the sidebar once you click on something in there. */
    toc.addEventListener('click', function(e) {
      if(document.body.classList.contains('toc-sidebar') && !sidebarMedia.matches) {
        var el = e.target;
        while (el != toc) { // find closest <a>
          if (el.tagName.toLowerCase() == "a") {
            toggleSidebar(false);
            return;
          }
          el = el.parentElement;
        }
      }
    }, false);
  }
  else {
    console.warn("Can't find Table of Contents. Please use <nav id='toc'> around the ToC.");
  }

  /* Amendment Diff Toggling */
  var showDiff = function(event) {
    var a = event.target.parentElement.parentElement;
    var ins = document.querySelectorAll("ins[cite='#" + a.id + "'], #" + a.id + " ins" );
    var del = document.querySelectorAll("del[cite='#" + a.id + "'], #" + a.id + " del" );
    ins.forEach( function(e) { e.hidden = false; e.classList.remove("diff-inactive") });
    del.forEach( function(e) { e.hidden = false; e.classList.remove("diff-inactive") });
    a.querySelectorAll("button[value=diff]")[0].disabled = true;
    a.querySelectorAll("button[value=old]")[0].disabled = false;
    a.querySelectorAll("button[value=new]")[0].disabled = false;
  }
  var showOld = function(event) {
    var a = event.target.parentElement.parentElement;
    var ins = document.querySelectorAll("ins[cite='#" + a.id + "'], #" + a.id + " ins" );
    var del = document.querySelectorAll("del[cite='#" + a.id + "'], #" + a.id + " del" );
    ins.forEach( function(e) { e.hidden = true;  e.classList.add("diff-inactive") });
    del.forEach( function(e) { e.hidden = false; e.classList.add("diff-inactive") });
    a.querySelectorAll("button[value=diff]")[0].disabled = false;
    a.querySelectorAll("button[value=old]")[0].disabled = true;
    a.querySelectorAll("button[value=new]")[0].disabled = false;
  }
  var showNew = function(event) {
    var a = event.target.parentElement.parentElement;
    var ins = document.querySelectorAll("ins[cite='#" + a.id + "'], #" + a.id + " ins" );
    var del = document.querySelectorAll("del[cite='#" + a.id + "'], #" + a.id + " del" );
    ins.forEach( function(e) { e.hidden = false;  e.classList.add("diff-inactive") });
    del.forEach( function(e) { e.hidden = true; e.classList.add("diff-inactive") });
    a.querySelectorAll("button[value=diff]")[0].disabled = false;
    a.querySelectorAll("button[value=old]")[0].disabled = false;
    a.querySelectorAll("button[value=new]")[0].disabled = true;
  }
  var amendments = document.querySelectorAll('[id].amendment, [id].correction, [id].addition');
  amendments.forEach( function(a) {
    var ins = document.querySelectorAll("ins[cite='#" + a.id + "'], #" + a.id + " ins" );
    var del = document.querySelectorAll("del[cite='#" + a.id + "'], #" + a.id + " del" );
    if (ins.length == 0 && del.length == 0) { return; }

    var tbar = document.createElement('div');
    tbar.lang = 'en';
    tbar.className = 'amendment-toggles';

    if (document.respec) tbar.classList.add('removeOnSave');

    var toggle = document.createElement('button');
    toggle.value = 'diff'; toggle.innerHTML = 'Show Change'; toggle.disabled = true;
    toggle.addEventListener('click', showDiff, false);
    tbar.appendChild(toggle);

    toggle = document.createElement('button');
    toggle.value = 'old'; toggle.innerHTML = 'Show Current';
    toggle.addEventListener('click', showOld, false);
    tbar.appendChild(toggle);

    toggle = document.createElement('button');
    toggle.value = 'new'; toggle.innerHTML = 'Show Future';
    toggle.addEventListener('click', showNew, false);
    tbar.appendChild(toggle);

    a.appendChild(tbar);
  });

  /* Wrap tables in case they overflow */
  var tables = document.querySelectorAll(':not(.overlarge) > table.data, :not(.overlarge) > table.index');
  var numTables = tables.length;
  for (var i = 0; i < numTables; i++) {
    var table = tables[i];
    if (!table.matches('.example *, .note *, .advisement *, .def *, .issue *')) {
      /* Overflowing colored boxes looks terrible, and also
         the kinds of tables inside these boxes
         are less likely to need extra space. */
      var wrapper = document.createElement('div');
      wrapper.className = 'overlarge';
      table.parentNode.insertBefore(wrapper, table);
      wrapper.appendChild(table);
    }
  }

  /* Deprecation warning */
  if (document.location.hostname === "www.w3.org" && /^\/TR\/\d{4}\//.test(document.location.pathname)) {
    var request = new XMLHttpRequest();

    request.open('GET', 'https://www.w3.org/TR/tr-outdated-spec');
    request.onload = function() {
      if (request.status < 200 || request.status >= 400) {
        return;
      }
      try {
        var currentSpec = JSON.parse(request.responseText);
      } catch (err) {
        console.error(err);
        return;
      }
      document.body.classList.add("outdated-spec");
      var node = document.createElement("p");
      node.classList.add("outdated-warning");
      node.tabIndex = -1;
      node.setAttribute("role", "dialog");
      node.setAttribute("aria-modal", "true");
      node.setAttribute("aria-labelledby", "outdatedWarning");
      if (currentSpec.style) {
          node.classList.add(currentSpec.style);
      }

      var frag = document.createDocumentFragment();
      var heading = document.createElement("strong");
      heading.id = "outdatedWarning";
      heading.innerHTML = currentSpec.header;
      frag.appendChild(heading);

      var anchor = document.createElement("a");
      anchor.href = currentSpec.latestUrl;
      anchor.innerText = currentSpec.latestUrl + ".";

      var warning = document.createElement("span");
      warning.innerText = currentSpec.warning;
      warning.appendChild(anchor);
      frag.appendChild(warning);

      var button = document.createElement("button");
      var handler = makeClickHandler(node);
      button.addEventListener("click", handler);
      button.innerHTML = "&#9662; collapse";
      frag.appendChild(button);
      node.appendChild(frag);

      function makeClickHandler(node) {
        var isOpen = true;
        return function collapseWarning(event) {
          var button = event.target;
          isOpen = !isOpen;
          node.classList.toggle("outdated-collapsed");
          document.body.classList.toggle("outdated-spec");
          button.innerText = (isOpen) ? '\u25BE collapse' : '\u25B4 expand';
        }
      }

      document.body.appendChild(node);
      button.focus();
      window.onkeydown = function (event) {
        var isCollapsed = node.classList.contains("outdated-collapsed");
        if (event.keyCode === ESCAPEKEY && !isCollapsed) {
          button.click();
        }
      }

      window.addEventListener("click", function(event) {
        if (!node.contains(event.target) && !node.classList.contains("outdated-collapsed")) {
          button.click();
        }
      });

      document.addEventListener("focus", function(event) {
        var isCollapsed = node.classList.contains("outdated-collapsed");
        var containsTarget = node.contains(event.target);
        if (!isCollapsed && !containsTarget) {
          event.stopPropagation();
          node.focus();
        }
      }, true); // use capture to enable event delegation as focus doesn't bubble up
    };

    request.onerror = function() {
      console.error("Request to https://www.w3.org/TR/tr-outdated-spec failed.");
    };

    request.send();
  }

  /* Dark mode toggle */
  const darkCss = document.querySelector('link[rel~="stylesheet"][href^="https://www.w3.org/StyleSheets/TR/2021/dark"]');
  if (darkCss) {
    const colorScheme = localStorage.getItem("tr-theme") || "auto";
    const browserDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    const theme = colorScheme === "auto" ? (browserDarkMode ? "dark" : "light") : colorScheme;

    darkCss.disabled = theme === "light";
    darkCss.media = theme === "dark" ? "(prefers-color-scheme: dark)" : "";
    document.body.classList.toggle("darkmode", theme === "dark")
    const render = document.createElement("div");
    function createOption(option) {
      const checked = option === colorScheme;
      return `
        <label>
          <input name="color-scheme" type="radio" value="${option}" ${checked ? "checked": ""}>
          <span>${option}</span>
        </label>
      `.trim();
    }
    render.innerHTML = `
      <a id="toc-theme-toggle" role="radiogroup" aria-label="Select a color scheme">
        <span aria-hidden="true"><img src="https://www.w3.org/StyleSheets/TR/2021/logos/dark.svg" title="theme toggle icon" /></span>
        <span>
        ${["light", "dark", "auto"].map(createOption).join("")}
        </span>
      </a>
    `;
    const changeListener = (event) => {
      const { value } = event.target;
      const browserDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      const theme = value === "auto" ? (browserDarkMode ? "dark" : "light") : value;

      darkCss.disabled = theme === "light";
      darkCss.media = "";
      document.body.classList.toggle("darkmode", theme === "dark")
      localStorage.setItem("tr-theme", value);
    };
    render.querySelectorAll("input[type='radio']").forEach((input) => {
      input.addEventListener("change", changeListener);
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
      const colorScheme = localStorage.getItem("tr-theme") || "auto";
      document.body.classList.toggle("darkmode", colorScheme === "auto" ? event.matches : colorScheme === "dark");
    });

    var tocNav = document.querySelector('#toc-nav');
    tocNav.appendChild(...render.children);
  }

})();
</script>
</body>
</html>
