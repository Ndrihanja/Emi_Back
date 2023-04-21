<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIENVENUE</title>
</head>
<body>
<div
    style="width: 100%; height: 100%; background-color: rgb(221, 221, 221); position: absolute; padding: 0; font-family: Arial, Helvetica, sans-serif;">
    <div style="width: 100%; height: 64px;float: left; background-color: rgb(54, 54, 54);
        padding: 0px; position: relative; font-weight: bold; text-align: center; color: white;">
        <div style="width: 128px;height: 100%;
            background-color: rgb(255, 255, 255); float: left; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
            <img src="{{ $message->embed(public_path('img/vitsika.png')) }}" style="height: 80%;padding-top: 6px;" /></div>
        <div style="width: calc(100% - 128px); text-align: center; float: left;padding-top: 15px;font-size: 150%;">
            VITSIKA
        </div>
    </div>

    <div
        style="float: left; width: 100%; height: calc(100% - 64px); background-color: rgba(255, 0, 0, 0); position: relative;">
        <div style="position:absolute; width: 450px; height: 500px;background-color: rgb(255, 255, 255);
            float: none;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            font-size: 130%;
            padding: 20px;
            text-align: center;
            ">

            Nous sommes heureux de vous souhaiter la BIENVENUE !

            <div style="
                    position:absolute;
                    float: none;
                    bottom: 0%;
                    left: 50%;
                    transform: translate(-50%, 0%);
                    background-color:rgb(53, 156, 16);
                    margin-bottom: 50px;
                    color: white;
                    border-radius: 10px;
                    padding: 10px;
                    font-size: 200%;
                ">
                124578
            </div>
        </div>
    </div>

</div>


</body>
</html>
