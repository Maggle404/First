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
            ->setName($name)
            ->setAtk($atk)
            ->setMag($mag)
            ->setHp($hp)
            ->setMana($mana);

        $entityManager->persist($player);
        $entityManager->flush();

        return $this->render('player/index.html.twig', ["player" => $player]);
    }


    #[Route('/player/show/{id}', name: 'app_player_show')]
    public function show(Players $player){
        return $this->render("index.html.twig", ['player' => $player]);
    }

    #[Route('/player/all', name: 'app_player_all')]
    public function showAll(EntityManagerInterface $entityManager){
        $players = $entityManager->getRepository(Players::class)->findAll();
        return $this->render('player/show.html.twig', ["players" => $players]);
    }

    #[Route('/player/delete/{id}', name:"app_player_delete")]
    public function delete(EntityManagerInterface $entityManager, Players $player){
        $entityManager->remove($player);
        $entityManager->flush();
    }
    
    #[Route('/player/form', name: "player_form")]
    public function form(): Response{
        return $this->render('player/form.html.twig');
    }
}
?>
