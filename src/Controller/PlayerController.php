
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php 

        namespace App\Controller;

        use App\Entity\Player;
        use Doctrine\ORM\EntityManagerInterface;
        use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
        use Symfony\Component\HttpFoundation\Response;
        use Symfony\Component\Routing\Annotation\Route;
        use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


        class TestController extends AbstractController{
    
            #[Route('/player/create', name: 'app_player_create')]
    public function save(EntityManagerInterface $EntityManager): Response
    {
        $name = $request->request->get('name');
        $atk = 
        $player = new Player();
        $player
            ->setName("Jonathan")
            ->setAtk("150")
            ->setMag("150")
            ->setHp("150")
            ->setMana("500");
        $EntityManager->persist($player);
        $EntityManager->flush();

            return $this->redirectToRoute('app_player_show', ['id' => $player->getId()]);
    }

        #[Route('/player/show/{id}', name: 'app_player_show')]
    public function show(Player $player)
    {
        return $this->render('player/show.html.twig')
    }

    #[Route('/player/delete/{id}', name: 'app_player_delete')]
    public function delete(EntityManagerInterface $EntityManager, Player $player){
        $EntityManager->remove($player);
        $EntityManager->flush();
        return $this->redirectToRoute('app_player_show_all');
    }
    
    #[Route('/player/all', name: 'app_player_show')]
    public function delete(EntityManagerInterface $EntityManager, Player $player){
        $EntityManager->remove($player);
        $EntityManager->flush();
        return $this->redirectToRoute('app_player_show_all');
    }
}
    ?>
    </p>
    </body>
</html>