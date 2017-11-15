<?php

$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2017052807375863",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAt7vJStine14uL+xNFildCYRymZzg707wyeWnNwKldabes46eHWKmYPBmonnecWbuyBfqeX8UrFegcnFxO9s0L4VuCQiFm8DA6nauCxkmVcBWyUhKdA/KuGJazaFYGVU/z332spceSWmu5tVimEmu8Gk12E6wCK857OREd360qd69DR87DsB74LIW1OClWinFjdUYyxHDHa6DtOE1J+9x+YC3BL8+ZBIX5WE3yhve0gxHgnnCiyK19Ezg2L5kYTa1SlwzwVkmrAttbfnjTF/w/wAnCYJ2vslGGehrMFJKCAN1hlUG9mB8MPHOfEte63s4yfUsokoTXRfmJHWCDBvS4wIDAQABAoIBAGU3Dsmrln/wvxLpYwHtYXJnw1X6RTOv0hf26mn0jD/G4HIcA+B+QteuN2wUJMVmBe62thWeOz5Bu4KwGcf2lsYDBD33stq9kcjX/kLg5OxiW6zgpRtQw8VVcV5MHqM+AjwE0U1K0IVyscY6EOmB1dxcqSvzFSiDly54BXuqkk3tFdvBAnHgcM8ukjiYO7ZghbN4XsCOI3CjuVANC9GR3cqK8NLIzYL5wiYvbc1cTtOlXx7iQuZJrBbiQ7GQHEsgcb7AQMW8buD7DHDVn5gqB4mPL/pVOkJJSq3woJIANzFjjOmWLPL4Mei02KoyDmf4AOK/dgw1VzA1gmGtkGXzuJECgYEA5xct7BSLJFQaLVee6Tjwbz0N8bCXcljsIT+2d0rd4nKlso2S1hSB+8QMzT5Q/0y3gjiwQguZ5+KvNkAOdy2XWlixM5OV+7Kmhl9eDM3U5Bq2tA8jYLWznAF2vw9XI2gtY9+YZT9gWehOm7UGitrMbgU8x0tVSHpIqgu3HahbOVkCgYEAy4nQyeBXg9AS9p7M3JvHtMeQGuhhxGEC9DffD+2p0cCOMzBcLR5AXZfT1qA6OeEn6J634f48e9b1RPjTc95vaHNdwbObeBV+345JIKFgPsOxPaTs8N5sHbIOtY/wlYyFyqZhtZizTkMAhJ7RVCr1XjlP72+Q0sKONSy4DWrDqpsCgYEApIVqGkNd9FUz9cgFyMDS3D85aDJy/+Oy6ND1VOSmJ4u7z+ze9y7Og7HF83FENR4nH7zAL6UWw3Itj4/3PH3m3Vl7ft65zuIXkF7hFHiN8n/aR0LnyvhRkOWx5sBDJ2AJwKr1Uk/WhuvO2yf8KmsvU7zC0pgddWYpyXZhvemYWLECgYEAqn/48ZNHXDjKGeNuswKf6TUe5xtxAqNNaS0AY4RwNC/8Lq89F+J2grBzmR/BhsiwuLF0UhC5s/eeoDdcUnyrkLDLgj6lZpODI1w6r+XfDNS7PWtRvHhl0v5cSgWYwH3leZuk0A1pbo67+Vxc+AfAYTzbVDR9+b9Whv698ydTXy8CgYB1Iv6m0jHugwS1Vk4gbhVWI3cQnoXn7gb8Bf6RRR7k0MMJHbxwy+LYXuP8HGMkG4wCJCyQcLFcb0YD3jIXzSmGXZwafJUONCR0sIKxix5TNlmAj89A3w43XpdKbwY9TddordwQsSfkKkOcJRZc4hd4MNHDaIwR07Pxd0M9G52pLw==",
		//异步通知地址
		'notify_url' => "http://pay.neon.appflint.com/pay/pay/ali-call-back",
		
		//同步跳转
		'return_url' => "http://pay.neon.appflint.com/pay/pay/ali-return",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
// 		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwxLUBpfv/IUepnrk9kjEGII7Wla/8eumZXbMPn3PBWERmnRT6GVAoAm2QzUMr1g/6kYcOd9XTJEhoXwR8A5l4WZ1sE6vNvsVwfJAxhLjb6NaLjU2zh7M75FTFvS56cip38gRzaBMZcJcjR4GyGlplbFYczqpisp+Ws1gVfTcZtwtcZEvQdFORx2B2KSQLjgBG/Fslmo5gQhNzwD81+/fBTWDoN9BVuO8yGZaSFlWv4ErMJDxii280odD5QFCFINeSzQzR7gvhPx/IKcOHtpGx5R6l0Lrj3BUM5YIaZIZar/1RK3R34CVw0dOQtnHfUfWuLljiGTOcyQAOsfHvBN8IwIDAQAB"
    
       
);