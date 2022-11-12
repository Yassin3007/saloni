<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="احجز موعدك مع صالونك دون الحاجة الي التنقل من مكانك"
    />
    <meta name="keywords" content="saloni.ma" />
    <title>Saloni.ma</title>
    <link rel="shortcut icon" href="./images/ICONE 1.png" type="image/x-icon" />
      <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
      <link rel="stylesheet" href="{{asset(getLink())}}" />
  </head>
  <body class={{getLang()}}>
  <img width="100%"  src="{{asset('storage/uploads/sallons/'.$x)}}" alt="img" />
  </body>
</html>
