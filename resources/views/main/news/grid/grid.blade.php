@include('main.news.grid._wide',            ['categories'=>$categories,'numb'=>$numb])
@include('main.news.grid._line',            ['categories'=>$categories,'numb'=>$numb+1])
@include('main.news.grid._wide-left',       ['categories'=>$categories,'numb'=>$numb+4])
@include('main.news.grid._line',            ['categories'=>$categories,'numb'=>$numb+6])
@include('main.news.grid._wide-right',      ['categories'=>$categories,'numb'=>$numb+9])
@include('main.news.grid._line',            ['categories'=>$categories,'numb'=>$numb+11])