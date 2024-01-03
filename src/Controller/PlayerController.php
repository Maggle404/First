<?php 
namespace App\Controller;

use App\Entity\Players;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class PlayersController extends AbstractController{
        public function create(EntityManagerInterface $entityManager, Request $request){
        
        $name = $request->request->get("name");
        $atk = $request->request->get("atk");
        $mag = $request->request->get("mag");
        $hp = $request->request->get("hp");
        $mana = $request->request->get("mana");
        
        $player = new Players();
        $player
            ->setName("Jonathan")
            ->setAtk("150")
            ->setMag("150")
            ->setHp("150")
            ->setMana("500");

        $entityManager->persist($player);
        $entityManager->flush();

        return $this->render('player/index.html.twig', ["player" => $player]);
    }


    #[Route('/player/show/{id}', name: 'app_player_show_id')]
    public function showId(Players $player){
        return $this->render("show.html.twig", ['player' => $player]);
    }

    #[Route('/player/showByName/{name}', name: 'app_player_show_name')]
    public function showName(string $name){
        return $this->render("show.html.twig", ['name' => $name]);
    }
    
}
?>
