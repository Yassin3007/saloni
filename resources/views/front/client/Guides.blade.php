@extends('layouts.client')

@section('content')
    <!-- start content -->
    <div class="content guides">
        <div class="image">
            <img src="{{asset('assets/images/test.jpeg')}}" alt="guides" />
        </div>
        <div class="text">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat a
            obcaecati ipsum. Laudantium non doloremque voluptas, sapiente aut iure
            qui veniam nihil dolorum odit, vitae assumenda tempore amet,
            reprehenderit porro.
        </div>
        <div class="videos">
            <iframe
                src="https://www.youtube.com/embed/9QC-PFHo8Yw?list=PLDoPjvoNmBAwGClt7wqdUOfqZbq_f2Uek"
                title="مقدمة عن البرمجة #01 - يعني ايه برمجة ؟ وايه متطلبات الكمبيوتر علشان اتعلم ؟"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
            <iframe
                src="https://www.youtube.com/embed/9QC-PFHo8Yw?list=PLDoPjvoNmBAwGClt7wqdUOfqZbq_f2Uek"
                title="مقدمة عن البرمجة #01 - يعني ايه برمجة ؟ وايه متطلبات الكمبيوتر علشان اتعلم ؟"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
            <iframe
                src="https://www.youtube.com/embed/9QC-PFHo8Yw?list=PLDoPjvoNmBAwGClt7wqdUOfqZbq_f2Uek"
                title="مقدمة عن البرمجة #01 - يعني ايه برمجة ؟ وايه متطلبات الكمبيوتر علشان اتعلم ؟"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>
    </div>
    <!-- end content -->

@endsection


