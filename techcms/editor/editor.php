<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css">
</head>
<style type="text/css">
	.hidden{display:none;}
</style>
<body>
 

   <div class="container-fluid">
             <br><br>
   	    <h1 align="center">محرر  نص</h1>
   	         <br><br><br>
   	    <div class="col-md-12">
   
<textarea name="" id="content" cols="30" rows="50"></textarea>

 <input name="image" type="file" id="upload" class="hidden" onchange="">
</div>
 </div>
  
   </body>
 
 
  

</html>
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.js"></script>
<script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>

 
<style type="text/css">
textarea#files {
    width: 600px;
    height: 200px;
    cursor: pointer
}
</style>
 
 
 <script type="text/javascript">
 
$(document).ready(function() {
 
 
var BASE_URL="/asaham2/";
      tinymce.init({
         selector: "#content",
        theme: "modern",
        // width: 680,
        height: 600,
        relative_urls: false,
        remove_script_host: false,
        // document_base_url: BASE_URL,

    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak  responsivefilemanager ",
      "searchreplace wordcount visualblocks visualchars code  fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
      
    toolbar1: "insertfile undo redo  localautosave| styleselect formatselect fontselect fontsizeselect | cut copy paste | bold italic underline removeformat | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink image quickupload searchreplace contextmenu template directionality",
    toolbar2: "| responsivefilemanager |  print preview media visualblocks fullscreen  code| forecolor backcolor emoticons",
     
       
     content_css: ['bootstrap/css/bootstrap.css',
     'css/bootstrap.css'],

 style_formats:[
{title: 'Inline', items: [
    {title: 'Strikethrough', inline: 'span', styles : {textDecoration : 'line-through'}, icon: 'strikethrough'},
    {title: 'Superscript', inline: 'sup', icon: 'superscript'},
    {title: 'Subscript', inline: 'sub', icon: 'subscript'},
    {title: 'Marker',           inline: 'mark'},
    {title: 'Big',              inline: 'big'},
    {title: 'Small',            inline: 'small'},
    {title: 'Typewriter',       inline: 'tt'},
    {title: 'Computer Code',    inline: 'code', icon: 'code'},
    {title: 'Keyboard Phrase',  inline: 'kbd'},
    {title: 'Sample Text',      inline: 'samp'},
    {title: 'Variable',     inline: 'var'},
    {title: 'Deleted Text', inline: 'del'},
    {title: 'Inserted Text',    inline: 'ins'},
    {title: 'Cited Work',       inline: 'cite'},
    {title: 'Inline Quotation', inline: 'q'},
 
]},
{title: 'Containers', items: [
    {title: 'section', block: 'section', wrapper: true, merge_siblings: false},
    {title: 'article', block: 'article', wrapper: true, merge_siblings: false},
    {title: 'blockquote', block: 'blockquote', wrapper: true},
    {title: 'hgroup', block: 'hgroup', wrapper: true},
    {title: 'aside', block: 'aside', wrapper: true},
    {title: 'figure', block: 'figure', wrapper: true}
]},
{title: 'Images', items: [
    {title: 'Styled image (left)',
        selector: 'img',
        classes: 'img-left'
    },
    {title: 'Styled image (right)',
        selector: 'img',
        classes: 'img-right'
    },
    {title: 'Styled image (center)',
        selector: 'img',
        classes: 'img-center'
    },
]}    ],
        image_advtab: true,

        external_filemanager_path: BASE_URL + "filemanager/",
        filemanager_title: "مصرف اليمن والبحرين الشامل",
        external_plugins: {"filemanager": BASE_URL + "filemanager/plugin.min.js"}

    });


});

 
       
      
 
</script>

 
 
 