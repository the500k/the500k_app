
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Invoice</title>
    <style type="text/css">
 body { font: 12pt Georgia, "Times New Roman", Times, serif; line-height: 1.3; padding-top: 50px; } div.header { display: block; text-align: center; position: running(header); width: 100%; } div.footer { display: block; text-align: center; position: running(footer); width: 100%; } @page { /* switch to landscape */ size: landscape; /* set page margins */ margin: 0.5cm; @top-center { content: element(header); } @bottom-center { content: element(footer); } @bottom-right { content: counter(page) " of " counter(pages); } } .custom-page-start { margin-top: 50px; }
  </style>
</head>
<body>
<h1>Clients report</h1>

<!-- Custom HTML header -->
<div class="header">
    Annual Report of our Company
</div>

<!-- Custom HTML footer -->
<div class="footer">
    Address: William Road
</div>

<#assign clients = Root.bands.Clients />

<#list clients as client>
<div class="custom-page-start" style="page-break-before: always;">
    <h2>Client</h2>

    <p>Name: </p>
    <p>Summary: </p>
</div>
</#list>
</body>
</html>