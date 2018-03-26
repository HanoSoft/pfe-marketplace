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



        $brand=new Brand();
        $brand->setBrandName('Lee');
        $brand->setDescription('<p>LEE</p>

        <p>A chaque personne son Lee. Sp&eacute;cialiste du jean d&egrave;s ses d&eacute;buts, la marque r&eacute;solument US a su se frayer une place dans le paysage du pr&ecirc;t-&agrave;-porter en d&eacute;clinant des collections ancr&eacute;es dans l&rsquo;esprit de la country, si ch&egrave;re &agrave; son &eacute;tat d&rsquo;origine, le Kansas. Ce n&rsquo;est donc pas si &eacute;tonnant que la griffe Lee ait choisi d&rsquo;habiller des l&eacute;gendes telles que James Dean et Marilyn Monroe. Le jean id&eacute;al qui colle &agrave; la peau, la chemise &agrave; carreaux bien coup&eacute;e&hellip; &agrave; adopter au quotidien, pour homme comme pour femme.</p>');
        $logo=new BrandImage();
        $logo->setName('2018-03-26-16-32-35logo_18184.jpg');
        $brand->setLogo($logo);
        $brandImage=new BrandImage();
        $brandImage->setName('2018-03-26-16-32-35generic_v4.jpg');
        $brand->setBrandImage($brandImage);
        $manager->persist($brand);
        $manager->flush();

/*
        $category = new Category();
        $category->setName("Meuble");
        $manager->persist($category);

        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('2 chaises Pop - Blanc');
        $product->setPrice(59.00);
        $product->setProductDetails("<p>2 chaises.<br />
        Assise et dossier en polypropyl&egrave;ne.<br />
        Pieds en&nbsp;<strong>h&ecirc;tre massif</strong>.<br />
        Entretoises en acier.<br />
        <br />
        <strong>Coloris</strong>&nbsp;: blanc et naturel<br />
        <strong>Mati&egrave;re</strong>&nbsp;:<br />
        Assise et dossier : polypropyl&egrave;ne<br />
        Pieds : h&ecirc;tre massif<br />
        Entretoises : acier<br />
        <strong>Dimensions</strong>&nbsp;: L46,5 x P52 x H81,5 cm<br />
        <strong>Dimensions assise</strong>&nbsp;: P42 x H42 cm<br />
        <br />
        <strong>Garantie</strong>&nbsp;: 1 an&nbsp;</p>");
        $product->setQuantity(200);
        $image=new Image();
        $image1=new Image();
        $image2=new Image();
        $image3=new Image();
        $image4=new Image();
        $image->setName("2018-03-22-19-49-06products_9078852_image1_original.jpg");
        $image->setLabel("chaise");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("2018-03-22-19-49-18products_9078852_image2_original.jpg");
        $image1->setLabel("chaise");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $image2->setName("2018-03-22-19-49-29products_9078852_image3_original.jpg");
        $image2->setLabel("chaise");
        $image2->setProduct($product);
        $manager->persist($image2);
        $image3->setName("2018-03-22-19-49-39products_9078852_image4_original.jpg");
        $image3->setLabel("chaise");
        $image3->setProduct($product);
        $manager->persist($image3);
        $image4->setName("2018-03-22-19-49-50products_9078852_image5_original.jpg");
        $image4->setLabel("chaise");
        $image4->setProduct($product);
        $manager->persist($image4);
        $manager->persist($product);
        $manager->flush();

        $category = new Category();
        $category->setName("High-Tech");
        $manager->persist($category);
        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('PC portable Lenovo Thinkpad L440 reconditionné - Noir');
        $product->setPrice(159.00);
        $product->setProductDetails("<p><span style=\"color:#1abc9c\"><strong>Le Lenovo ThinkPad L440 4Go 500Go</strong></span></p>

<p><strong>b&eacute;n&eacute;ficie d&#39;une Garantie 1 an est &eacute;quip&eacute; d&#39;un processeur Intel Celeron 2950M 2.0GHz et dispose de 4Go (4096Mo) de m&eacute;moire vive. Windows 10 Famille 64bits est le syst&egrave;me d&#39;exploitation install&eacute; sur l&#39;appareil.</strong></p> ");
        $product->setQuantity(300);
        $image=new Image();
        $image1=new Image();
        $image2=new Image();
        $image3=new Image();
        $image->setName("2018-03-22-20-29-46products_9052045_image1_original.jpg");
        $image->setLabel("pc");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("2018-03-22-20-29-55products_9052045_image2_original.jpg");
        $image1->setLabel("pc");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();
        $image2->setName("2018-03-22-20-30-08products_9052045_image3_original.jpg");
        $image2->setLabel("pc");
        $image2->setProduct($product);
        $manager->persist($image2);
        $image3->setName("2018-03-22-20-30-20products_9052045_image4_original.jpg");
        $image3->setLabel("pc");
        $image3->setProduct($product);
        $manager->persist($image3);


        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Ordinateur de bureau HP Compaq 8300 Elite AIO reconditionné');
        $product->setPrice(329.00);
        $product->setProductDetails("<p><strong>G&eacute;n&eacute;ral</strong><br />
<strong>Type de produit</strong>&nbsp;: ordinateur de bureau HP Compaq 8300 Elite AIO reconditionn&eacute;&nbsp;<br />
<strong>Syst&egrave;me d&#39;exploitation</strong>&nbsp;: Windows 7 Professionnel 64 bits COA&nbsp;<br />
<strong>Processeur</strong>&nbsp;: Intel Core i5 (3&egrave;me g&eacute;n&eacute;ration) 3570 / 3.4 GHz<br />
<strong>Logiciel</strong>&nbsp;: Adobe Flash Player, HP Help and Support, DVD de restauration pour Windows 7 &Eacute;dition professionnelle 64 bits, Microsoft Security Essentials, HP ProtectTools Security Software Suite, HP Recovery Manager, HP Support Assistant, Bing Toolbar, Microsoft Office 2010 Starter, PDF Complete Corporate Edition, WinZip Basic, HP Marketplace, HP Wallpaper, HP Setup 9.0, Microsoft Advantage Program<br />
<strong>Etat</strong>&nbsp;: produit reconditionn&eacute; de grade A<br />
Le grade A correspond &agrave; un produit en tr&egrave;s bon &eacute;tat, cela signifie que la qualit&eacute; cosm&eacute;tique du produit est comme neuve.<br />
<br />
<strong>M&eacute;moire et stockage</strong><br />
<strong>Stockage</strong>&nbsp;: 128 GB<br />
<strong>Type</strong>&nbsp;: SSD<br />
<strong>M&eacute;moire</strong>&nbsp;: 4 GB DDR3 SDRAM - non ECC<br />
<br />
<strong>Affichage</strong><br />
<strong>Ecran</strong>&nbsp;: 23 pouces<br />
<strong>Technologie</strong>&nbsp;: IPS HD<br />
<strong>R&eacute;solution</strong>&nbsp;: 1920 x 1080 px&nbsp;<br />
<strong>Graphique</strong>&nbsp;: carte graphique Intel HD Graphics 4000<br />
<strong>Clavier</strong>&nbsp;: AZERTY<br />
<br />
<strong>Audio et vid&eacute;o</strong><br />
<strong>Cam&eacute;ra</strong>&nbsp;: oui<br />
<strong>Son</strong>&nbsp;: oui&nbsp;<br />
<br />
<strong>Connectivit&eacute; et navigation</strong><br />
<strong>Connectivit&eacute; sans fil</strong>&nbsp;: Ethernet, Fast Ethernet, Gigabit Ethernet<br />
<strong>Entr&eacute;e/sortie</strong>&nbsp;: 4 ports USB 3.0, 2 ports USB 2.0, 1 x clavier PS/2, 1 x souris PS/2, 1 x LAN (Gigabit Ethernet), 1 x casque, 1 x microphone, 1 x sortie de ligne audio, 1 x display port<br />
<br />
<strong>Batterie</strong><br />
Marque&nbsp;<strong>HP</strong>.<br />
<br />
<strong>Coloris</strong>&nbsp;: noir<br />
<strong>Dimensions</strong>&nbsp;: 43,623 x 56,19 x 19,56 cm<br />
<strong>Poids</strong>&nbsp;: 9,02 kg<br />
<br />
<strong>Garantie</strong>&nbsp;: 6 mois</p>");
        $product->setQuantity(250);
        $image=new Image();
        $image1=new Image();
        $image->setName("products_9052048_image1_original.jpg");
        $image->setLabel("ord");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9052048_image2_original.jpg");
        $image1->setLabel("Ordinateur");
        $image1->setProduct($product);
        $manager->persist($image1);
        $manager->flush();


        $product=new Product();
        $product->setCategory($category);
        $product->setProductName('Galaxy S8+ reconditionné - Noir - 64 GB - Grade A+');
        $product->setPrice(619.90);
        $product->setProductDetails("<p><span style=\"color:#e67e22\"><strong>G&eacute;n&eacute;ral</strong><br />
<strong>Type de produit</strong>&nbsp;</span>: Galaxy S8+ reconditionn&eacute;<br />
<span style=\"color:#e67e22\"><strong>Capacit&eacute;</strong>&nbsp;</span>: 64 GB<br />
<strong>RAM</strong>&nbsp;: 4 GB<br />
<strong>Micro SD</strong>&nbsp;: fente pour cartes Micro SDXC jusqu&#39;&agrave; 256 GB<br />
<strong>Syst&egrave;me d&#39;exploitation</strong>&nbsp;: Android&trade; 7.0 Nougat<br />
<strong>Processeur</strong>&nbsp;: Exynos 8895 2,3 GHz<br />
<strong>Type</strong>&nbsp;: Octa-Core<br />
<strong>Carte graphique</strong>&nbsp;: ARM Mali G71<br />
<strong>Grade de reconditionnement</strong>&nbsp;: A+<br />
Le grade A+ correspond au plus haut niveau de reconditionnement. Le produit ne pr&eacute;sente aucune trace d&#39;utilisation hormis quelques micro-rayures &eacute;ventuelles sur la face arri&egrave;re et sur la tranche. L&#39;appareil est 100% fonctionnel, test&eacute;, contr&ocirc;l&eacute;, nettoy&eacute; par des experts et livr&eacute; avec des accessoires neufs.<br />
<br />
<strong>Prix neuf</strong>&nbsp;: 809 &euro;<br />
<br />
<strong>Affichage</strong><br />
<strong>Type</strong>&nbsp;: &eacute;cran tactile incurv&eacute; multi-touch avec technologie AMOLED<br />
<strong>Taille</strong>&nbsp;: 6,2&quot;<br />
<strong>R&eacute;solution</strong>&nbsp;: 2960 x 1440 px 531 ppi<br />
<strong>Capteurs</strong>&nbsp;: empreinte digitale, acc&eacute;l&eacute;rom&egrave;tre, lumi&egrave;re ambiante et boussole<br />
<br />
<span style=\"color:#e67e22\"><strong>Audio et vid&eacute;o</strong><br />
<strong>Appareil photo</strong></span><span style=\"background-color:null\">&nbsp;: 12 MP &agrave; l&rsquo;arri&egrave;re et 8 MP l&#39;avant</span><br />
<span style=\"color:#e67e22\"><strong>Ouverture</strong></span><span style=\"background-color:null\"><span style=\"color:#e67e22\">&nbsp;</span>: </span>f/1,7<br />
<span style=\"color:#e67e22\"><strong>Enregistrement vid&eacute;o</strong>&nbsp;:</span> 4K (3840 x 2160 px)&nbsp;<br />
<br />
<span style=\"color:#e67e22\"><strong>Connectivit&eacute; et navigation</strong></span><br />
Double Nano SIM.<br />
USB-C.<br />
Port jack 3,5 mm.<br />
3G+/4G LTE.<br />
Wi-Fi 802.11 a/b/g/n/ac.<br />
Bluetooth 5.0/ADP/aptX/LE.<br />
NFC.<br />
Bandes GSM 850 MHz, 900 MHz, 1800 MHz, 1900 MHz.<br />
<br />
<span style=\"color:#e67e22\"><strong>Batterie</strong><br />
<strong>Capacit&eacute;</strong></span>&nbsp;: 3500 mAh<br />
<span style=\"color:#e67e22\"><strong>Autonomie en utilisation</strong></span>&nbsp;: 8 h<br />
<br />
<span style=\"color:#990033\"><strong>Coloris</strong></span>&nbsp;: noir<br />
<span style=\"color:#e74c3c\"><strong>DAS (t&ecirc;te)</strong>&nbsp;</span>: 0,260 W/Kg<br />
<span style=\"color:#e67e22\"><strong>Indice d&#39;&eacute;tanch&eacute;it&eacute;</strong></span>&nbsp;: IP68<br />
<span style=\"color:#e74c3c\"><strong>Dimensions</strong></span>&nbsp;: 159,5 x 73,4 x 8,1 mm<br />
<span style=\"color:#e67e22\"><strong>Poids</strong>&nbsp;</span>: 173 g<br />
<em>Chargeur inclus.</em><br />
<br />
<strong><span style=\"color:#e67e22\">Garantie</span>&nbsp;</strong>: 6 mois</p>");
        $product->setQuantity(250);
        $image=new Image();
        $image1=new Image();
        $image2=new Image();
        $image->setName("products_9075320_image1_original.jpg");
        $image->setLabel("portable");
        $image->setProduct($product);
        $manager->persist($image);
        $image1->setName("products_9075320_image2_original.jpg");
        $image1->setLabel("portable");
        $image1->setProduct($product);
        $manager->persist($image1);
        $image2->setName("products_9075320_image3_original.jpg");
        $image2->setLabel("portable");
        $image2->setProduct($product);
        $manager->persist($image2);
        $manager->flush();


*/





    }
}