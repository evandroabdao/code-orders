<?php
return array(
    'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => array(
        'description' => 'Handles payment types',
        'collection' => array(
            'description' => 'PaymentType Collection',
            'GET' => array(
                'description' => 'List all payment types',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes"
       },
       "first": {
           "href": "/ptypes?page={page}"
       },
       "prev": {
           "href": "/ptypes?page={page}"
       },
       "next": {
           "href": "/ptypes?page={page}"
       },
       "last": {
           "href": "/ptypes?page={page}"
       }
   }
   "_embedded": {
       "ptypes": [
           {
               "_links": {
                   "self": {
                       "href": "/ptypes[/:ptypes_id]"
                   }
               }
              "name": ""
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Create new payment type',
                'request' => '{
   "name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "name": ""
}',
            ),
        ),
        'entity' => array(
            'description' => 'PaymentType Entities',
            'GET' => array(
                'description' => 'Returns a payment type',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "name": ""
}',
            ),
            'PATCH' => array(
                'description' => 'Update partialy a payment type',
                'request' => '{
   "name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "name": ""
}',
            ),
            'DELETE' => array(
                'description' => 'Delete the payment type',
                'request' => '{
   "name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "name": ""
}',
            ),
            'PUT' => array(
                'description' => 'Update the payment type',
                'request' => '{
   "name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "name": ""
}',
            ),
        ),
    ),
    'CodeOrders\\V1\\Rest\\Products\\Controller' => array(
        'description' => 'Handles Products',
    ),
    'CodeOrders\\V1\\Rest\\Users\\Controller' => array(
        'description' => 'Handles users',
        'collection' => array(
            'description' => 'Collection of users',
            'GET' => array(
                'description' => 'Get Users',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users"
       },
       "first": {
           "href": "/users?page={page}"
       },
       "prev": {
           "href": "/users?page={page}"
       },
       "next": {
           "href": "/users?page={page}"
       },
       "last": {
           "href": "/users?page={page}"
       }
   }
   "_embedded": {
       "users": [
           {
               "_links": {
                   "self": {
                       "href": "/users[/:users_id]"
                   }
               }
              "id": "",
              "username": "",
              "first_name": "",
              "last_name": "",
              "role": ""
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Insert a user',
                'request' => '{
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
            ),
            'DELETE' => array(
                'description' => 'Delete a user',
                'request' => '{
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users"
       },
       "first": {
           "href": "/users?page={page}"
       },
       "prev": {
           "href": "/users?page={page}"
       },
       "next": {
           "href": "/users?page={page}"
       },
       "last": {
           "href": "/users?page={page}"
       }
   }
   "_embedded": {
       "users": [
           {
               "_links": {
                   "self": {
                       "href": "/users[/:users_id]"
                   }
               }
              "username": "",
              "first_name": "",
              "last_name": "",
              "role": ""
           }
       ]
   }
}',
            ),
            'PATCH' => array(
                'description' => 'Update partialy a user',
                'request' => '{
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users"
       },
       "first": {
           "href": "/users?page={page}"
       },
       "prev": {
           "href": "/users?page={page}"
       },
       "next": {
           "href": "/users?page={page}"
       },
       "last": {
           "href": "/users?page={page}"
       }
   }
   "_embedded": {
       "users": [
           {
               "_links": {
                   "self": {
                       "href": "/users[/:users_id]"
                   }
               }
              "username": "",
              "first_name": "",
              "last_name": "",
              "role": ""
           }
       ]
   }
}',
            ),
            'PUT' => array(
                'description' => 'update a user',
                'request' => '{
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users"
       },
       "first": {
           "href": "/users?page={page}"
       },
       "prev": {
           "href": "/users?page={page}"
       },
       "next": {
           "href": "/users?page={page}"
       },
       "last": {
           "href": "/users?page={page}"
       }
   }
   "_embedded": {
       "users": [
           {
               "_links": {
                   "self": {
                       "href": "/users[/:users_id]"
                   }
               }
              "username": "",
              "first_name": "",
              "last_name": "",
              "role": ""
           }
       ]
   }
}',
            ),
        ),
        'entity' => array(
            'description' => 'Entity Users',
            'GET' => array(
                'description' => 'Get user',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
            ),
            'PATCH' => array(
                'description' => 'Update partialy a user',
                'request' => '{
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
            ),
            'PUT' => array(
                'description' => 'Update a user',
                'request' => '{
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
            ),
            'DELETE' => array(
                'description' => 'Delete a user',
                'request' => '{
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/users[/:users_id]"
       }
   }
   "id": "",
   "username": "",
   "first_name": "",
   "last_name": "",
   "role": ""
}',
            ),
        ),
    ),
    'CodeOrders\\V1\\Rest\\Clients\\Controller' => array(
        'description' => 'Handles clients',
        'collection' => array(
            'description' => 'Collection of Clients',
            'GET' => array(
                'description' => 'Get the client list',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients"
       },
       "first": {
           "href": "/clients?page={page}"
       },
       "prev": {
           "href": "/clients?page={page}"
       },
       "next": {
           "href": "/clients?page={page}"
       },
       "last": {
           "href": "/clients?page={page}"
       }
   }
   "_embedded": {
       "clients": [
           {
               "_links": {
                   "self": {
                       "href": "/clients[/:clients_id]"
                   }
               }
              "id":"",
              "name": "",
              "document": "",
              "address": "",
              "zipcode": "",
              "city": "",
              "state": "",
              "responsible": "",
              "email": "",
              "phone": "",
              "obs": "",
              "id": ""
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Inser a new client',
                'request' => '{
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients[/:clients_id]"
       }
   }
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
            ),
            'DELETE' => array(
                'request' => '{

}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients"
       },
       "first": {
           "href": "/clients?page={page}"
       },
       "prev": {
           "href": "/clients?page={page}"
       },
       "next": {
           "href": "/clients?page={page}"
       },
       "last": {
           "href": "/clients?page={page}"
       }
   }
   "_embedded": {
       "clients": [
           {
               "_links": {
                   "self": {
                       "href": "/clients[/:clients_id]"
                   }
               }

           }
       ]
   }
}',
            ),
            'PUT' => array(
                'request' => '{

}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients"
       },
       "first": {
           "href": "/clients?page={page}"
       },
       "prev": {
           "href": "/clients?page={page}"
       },
       "next": {
           "href": "/clients?page={page}"
       },
       "last": {
           "href": "/clients?page={page}"
       }
   }
   "_embedded": {
       "clients": [
           {
               "_links": {
                   "self": {
                       "href": "/clients[/:clients_id]"
                   }
               }

           }
       ]
   }
}',
            ),
        ),
        'entity' => array(
            'description' => 'Client Entity',
            'GET' => array(
                'description' => 'Returns a Client',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients[/:clients_id]"
       }
   }
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
            ),
            'PATCH' => array(
                'description' => 'Update part of a client',
                'request' => '{
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients[/:clients_id]"
       }
   }
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
            ),
            'PUT' => array(
                'description' => 'Update a client',
                'request' => '{
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients[/:clients_id]"
       }
   }
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
            ),
            'DELETE' => array(
                'description' => 'Delete a client',
                'request' => '{
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients[/:clients_id]"
       }
   }
   "id":"",
   "name": "",
   "document": "",
   "address": "",
   "zipcode": "",
   "city": "",
   "state": "",
   "responsible": "",
   "email": "",
   "phone": "",
   "obs": "",
   "id": ""
}',
            ),
            'POST' => array(
                'request' => '{

}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/clients[/:clients_id]"
       }
   }

}',
            ),
        ),
    ),
);
