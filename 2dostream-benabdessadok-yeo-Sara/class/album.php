<?php
require_once 'connect.php';

class Album
{
    public int $id;
    public string $name;
    public int $views;
    public int $likes;
    public bool $isprivate;

    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->views = $array['views'];
        $this->likes = $array['likes'];
        $this->isprivate = $array['isprivate'] === 1;
    }
    static function GET ($id): bool|Album
    {
        $db = new Connect();
        $query = $db->pdo->prepare('SELECT * FROM album WHERE id='.$id);
        $query->execute();
        $result = $query->fetchAll();
        if(sizeof($result)>0){
            return new self($result[0]);
        }else{
            return false;
        }
    }
    static function all($user_id){

        $db = new Connect();
        $request = $db->pdo->prepare(
            'SELECT * FROM album JOIN album_owner t on album.id = t.album_id WHERE ab.user_id='.$user_id
        );
        $request->execute();
        $list = [];
        foreach($request->fetchAll() as $album){
            $list[] = new self($album);
        }

        return $list;
    }



    public function getItems(): array|bool
    {
        $db = new Connect();
        $request = $db->pdo->prepare(
            'SELECT album.*, my.movie_id FROM album
    				LEFT JOIN movie_album my ON my.album_id = album.id
                	WHERE album.id='.$this->id
        );
        $request->execute();
        $list = $request->fetchAll();

        if($list !== false){
            $stuff = [
                'movie' => [],
                'contributor' => []
            ];
            foreach ($list as $row){
                $stuff['movie'][] = $row['movie_id'];
            }
            $request = $db->pdo->prepare(
                'SELECT user.id FROM user JOIN album_owner ab on user.id = ab.user_id WHERE album_id='
                .$this->id
            );
            $request->execute();
            foreach($request->fetchAll() as $user){
                $stuff['contributor'][] = $user;
            }
        }

        return $stuff ?? false;
    }

    static function deleteAll($album_id):bool
    {
        $db = new Connect();
        $query = $db->pdo->prepare('DELETE FROM album WHERE id='.$album_id);
        return $query->execute();
    }

    public function toggleLike($user_id)
    {
        $db = new Connect();
        $request = $db->pdo->prepare('SELECT * FROM likes_owner WHERE album_id = :a AND user_id = :u');
        $request->execute(['a'=>$this->id, 'u'=>$user_id]);
        $arr = $request->fetchAll();

        if(sizeof($arr)>0){
            $query1 = 'DELETE FROM likes_owner WHERE user_id = :u AND album_id = :a';
            $query2 = 'UPDATE album SET album.likes = album.likes - 1 WHERE id = '.$this->id;
        }else{
            $query1 = 'INSERT INTO likes_owner(user_id, album_id) VALUES (:u, :a)';
            $query2 = 'UPDATE album SET album.likes = album.likes + 1 WHERE id = '.$this->id;
        }
        $request = $db->pdo->prepare($query2);
        $request->execute();

        $request = $db->pdo->prepare($query1);
        return $request->execute(['a'=>$this->id, 'u'=>$user_id]);

    }
    public function addView(){
        $db = new Connect();
        $request = $db->pdo->prepare('UPDATE album SET views = views +1 WHERE id = '.$this->id);
        $result = $request->execute();
        if($result){
            $this->views += 1;
        }
        return $result;

    }


}
