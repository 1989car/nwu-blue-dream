<?php
/*
 * Created on 2010-6-16
 *
 * ͼƬ��֤�뺯��
 */
 
//����4λ����ַ�
for ($i = 0; $i < 4; $i++)
{
    $num .= dechex(rand(1, 15)); //dechex��10����תΪ16����
}

//��¼session����֤ʹ��
session_start();
$_SESSION['vcode'] = $num;

$img = imagecreatetruecolor(60, 20); //����һ����ɫ������ͼƬ
$bgcolor = imagecolorallocate($img, 180, 221, 247); //����ͼƬ������ɫ
imagefill($img,0,0,$bgcolor);

//����������
for ($i = 0; $i < rand(0, 5); $i++)
{
    $linecolor = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($img, rand(0, 60), rand(0, 20), rand(0, 60), rand(0, 20), $linecolor);
}

//���������
for ($i = 0; $i < rand(0, 200); $i++)
{
    $pixelcolor = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($img, rand(0, 60), rand(0, 20), $pixelcolor);
}

$color = imagecolorallocate($img, 255, 255, 255); //����һ������ǰ����ɫ
imagestring($img, 6, 10, 3, $num, $color); //��ͼƬд������
header('content-type:image/png');
imagepng($img); 
?>
