<?php

namespace CoreBundle\Service\Repository;

/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 16/03/2018
 * Time: 12:00
 */
Interface AbstractRepository {
    public function add($form);
    public function edit($from);
    public function delete($id);
    public function getAll($value);
    public function find($id);
}
// ana sna3t interface hatha 7ateth fih les methodes eli houma commun binet entite kol w fi nafess wgt mostglin fi code
// chm3nha eno mthlan add ta3 produit mch nfsha add ta3 categorie ama mt2aked enou produit w categ 3endhom 2 methode add
//bch yab9ali zawji ay t7ebi nktblk 8adi ama 7abt code 9odamek milch tancopi
// bhi hatha interface rani mra lawla chkt w d5lt ba3thi ama ja cv mourh wth7a w7dk 2lbi bartie hathi mra lawlabgt fha bracha l2ni ne5dm fha wa7di mtlgch ref
// liha brcha kol wa7ed 5arf fi chira hhh ama hatha logique mta3i ana hhh bien tres bien
/*akidinterface wth7  c bien lmoufid wth7 jatk fkra wslt ey bien saisi tawa tant3dou lel classe 5dmth gbla chway esmh RepositoryManager  */