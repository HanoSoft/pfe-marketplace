<?php


namespace AdminBundle\DataFixtures\ORM;

use CoreBundle\Entity\Brand;
use CoreBundle\Entity\BrandImage;
use CoreBundle\Entity\Image;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Product;
use CoreBundle\Entity\Category;

class LoadProduct implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $logo=new BrandImage();
        $logo->setName('logo_25167.jpg');
        $brandImage=new BrandImage();
        $brandImage->setName('neo-13-23172534000000.png');
        $manager->persist($logo);
        $manager->persist($brandImage);
        $brand=new Brand();
        $brand->setBrandName('THOMSON');
        $brand->setDescription(null);
        $brand->setLogo($logo);
        $brand->setBrandImage($brandImage);
        $manager->persist($brand);
        $category = new Category();
        $category->setBrand($brand);
        $category->setName("PC et stockage");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('PC portable TH14-N4.128Y10 - Noir');
        $product->setPrice(529.00);
        $product->setProductDetails("<p><span style=\"font-size:16px\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"color:#e74c3c\"><strong>G&eacute;n&eacute;ral</strong></span></span></span><span style=\"font-size:20px\"><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"color:#e74c3c\"><strong> :</strong></span></span></span><br />
<strong>Type de produit&nbsp;</strong>: PC portable TH14-N4.128Y10<br />
<strong>Syst&egrave;me d&#39;exploitation&nbsp;</strong>: Windows 10<br />
<strong>Processeur&nbsp;</strong>: Intel&reg; Bay Trail Celeron&trade; N3050&nbsp;<br />
<strong>M&eacute;moire et stockage</strong><br />
<strong>ROM&nbsp;</strong>: 128 GB<br />
<strong>Type de m&eacute;moire</strong>&nbsp;: SSD<br />
<strong>RAM&nbsp;</strong>: 4 GB<br />
<strong>Type de m&eacute;moire</strong>&nbsp;: DDR3<br />
<strong>Affichage</strong><br />
<strong>Technologie</strong>&nbsp;: LCD LED<br />
<strong>Taille&nbsp;</strong>: 14&rsquo;&rsquo;<br />
<strong>R&eacute;solution&nbsp;</strong>: 1366 x 768 px<br />
<strong>Audio et vid&eacute;o</strong><br />
<strong>Cam&eacute;ra&nbsp;</strong>: 1 MP &agrave; l&rsquo;avant<br />
<strong>Connectivit&eacute; et navigation</strong><br />
<strong>Connectivit&eacute; sans fil&nbsp;</strong>: Wi-Fi IEEE 802.11 b/g/n et Bluetooth 4.0<br />
<strong>Connectique&nbsp;</strong>: 2 port USB 2.0, 1 port mini HDMI, 1 port DC et 1 prise jack 3,5 mm<br />
<strong>Clavier</strong>&nbsp;: AZERTY<br />
<strong>Batterie</strong><br />
<strong>Capacit&eacute;</strong>&nbsp;: 10400 mAh<br />
Marque&nbsp;<strong>Thomson</strong>.<br />
<strong>Coloris&nbsp;</strong>: rose et noir&nbsp;<br />
<strong>Garantie&nbsp;</strong>: 2 ans<br />
<em>Ce produit est soumis &agrave; la garantie du fournisseur.</em>&nbsp;</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9080596_image1_original.jpg");
        $image->setLabel("pc");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9080596_image2_original.jpg");
        $image1->setLabel("pc");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $manager->persist($product);
        $manager->flush();
    }
}