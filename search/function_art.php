<?php
function article_anl(string $article, string $search){
    $count = 0;
    $article = trim($article);
    $search = trim($search);
    while($count <= strlen($article)){
        $position = stripos($article,$search,$count);
        if($position === false){
            break;
        }else{
            $pos[]=$position;
            //echo $position ."<br>";
            $count = $position +1;
        } 
    }
    if(isset($pos)){
        return count($pos);
    }else{
        return 0;
    }
}

function mark(string $article, string $search , string $new){
    return str_ireplace($search, $new ,$article);
}

function count_article($article){
    return str_word_count($article);
}
function percentage($article,$search){
    return round(article_anl($article,$search)  / count_article($article) * 100,2);
}
?>