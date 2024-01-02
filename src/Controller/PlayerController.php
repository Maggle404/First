
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

        use App\Entity\Players;
        use Doctrine\ORM\EntityManagerInterface;
        use Symfony\Component\HttpFoundation\Response;
        use Symfony\Component\Routing\Annotation\Route;
        use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


        class TestController extends AbstractController{
    
            #[Route('/player/create', name: 'app_player_create')]
    public function save(EntityManagerInterface $EntityManager): Response
    {
        $name = $request->request->get('name'); 
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
    public function showId(Player $player){
        return $this->render( "show.html.twig", ['player' => $player]);
    }
    #[Route('/player/show/{nq;e}', name: 'app_player_show')]
    public function showName(string $name){
        return $this->render("show.html.twig", ["name" => "John"]);
    }
    
}
    ?>
    </p>
</body>
</html>