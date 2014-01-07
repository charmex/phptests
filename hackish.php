<?php

$path = 'http://indwebsb/portal/sites/default/files/theme_images/post-it-mini-c4.png';
$path2 = 'http://indwebsb/portal/sites/default/files/theme_images/notacdist5.png';
$path3 = 'http://indwebsb/portal/sites/default/files/theme_images/notaproyti1.png';

echo '
<div style="position:relative">
<div id="cont-img-post-it-mini"style="position:absolute; top:-230px; right:0;" >
<a href="/portal/node/add/proy-ti">
';
print( theme_image($path3, 'Proyectos TI', 'Proyectos TI', NULL, FALSE) );
echo '
</a>
<a href="/portal/node/add/computo-distribuido">
';

print( theme_image($path2, 'Computo Distribuido', 'Computo Distribuido', NULL, FALSE) );

echo '
</a>
<a href="/portal/#innova-form">
';
print( theme_image($path, 'Cuentanos tu idea', 'Cuentanos tu idea', NULL, FALSE) );
echo '
</a>
</div>
</div>
';

?>