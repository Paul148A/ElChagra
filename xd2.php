<!--Array demostrativo de una compra realizada con paypal, se puede escalar el array en caso de 
requerir un nuevo dato y subirlo a la base de datos-->


array (
  'detalles' => array 
  (
    'id' => '93T376382S965333S',
    'intent' => 'CAPTURE',
    'status' => 'COMPLETED',
    'purchase_units' => array 
    (
      0 => array 
      (
        'reference_id' => 'default',
        'amount' => array
         (
          'currency_code' => 'USD',
          'value' => '20.00',
        ),
        'payee' => array 
        (
          'email_address' => 'sb-4zgl621447390@business.example.com',
          'merchant_id' => 'SH7A6HNF97ZQA',
        ),
        'shipping' => array 
        (
          'name' => array 
          (
            'full_name' => 'John Doe',
          ),
          'address' => array 
          (
            'address_line_1' => '1 Main St',
            'admin_area_2' => 'San Jose',
            'admin_area_1' => 'CA',
            'postal_code' => '95131',
            'country_code' => 'US',
          ),
        ),
        'payments' => array 
        (
          'captures' => array 
          (
            0 => array 
            (
              'id' => '8Y676570R30946531',
              'status' => 'COMPLETED',
              'amount' => array 
              (
                'currency_code' => 'USD',
                'value' => '20.00',
              ),
              'final_capture' => true,
              'seller_protection' => array 
              (
                'status' => 'ELIGIBLE',
                'dispute_categories' => array 
                (
                  0 => 'ITEM_NOT_RECEIVED',
                  1 => 'UNAUTHORIZED_TRANSACTION',
                ),
              ),
              'create_time' => '2022-10-05T21:27:32Z',
              'update_time' => '2022-10-05T21:27:32Z',
            ),
          ),
        ),
      ),
    ),
    'payer' => array 
    (
      'name' => array 
      (
        'given_name' => 'John',
        'surname' => 'Doe',
      ),
      'email_address' => 'sb-ldmrq21459602@personal.example.com',
      'payer_id' => '3MTXMH9B8YV7G',
      'address' => array 
      (
        'country_code' => 'US',
      ),
    ),
    'create_time' => '2022-10-05T21:27:23Z',
    'update_time' => '2022-10-05T21:27:32Z',
    'links' => array 
    (
      0 => array 
      (
        'href' => 'https://api.sandbox.paypal.com/v2/checkout/orders/93T376382S965333S',
        'rel' => 'self',
        'method' => 'GET',
      ),
    ),
  ),
)