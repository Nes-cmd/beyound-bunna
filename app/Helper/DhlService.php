<?php
 
namespace App\Helper;

use Illuminate\Support\Facades\Http;

class DhlService
{
    public function getRate($adress){


    
    
    $curl = curl_init();
    // live https://express.api.dhl.com/mydhlapi
    // test https://api-mock.dhl.com/mydhlapi
    $accountNumber = 388030763;
    $baseurl = 'https://express.api.dhl.com/mydhlapi/';
    $url =  $baseurl."rates?accountNumber=". $accountNumber. "&originCountryCode=ET&originPostalCode=1000&originCityName=Addis%20Ababa&destinationCountryCode=".$adress['country_code']."&destinationPostalCode=".$adress['postal_code']."&destinationCityName=Prague&weight=5&length=15&width=10&height=5&plannedShippingDate=2020-02-26&isCustomsDeclarable=false&unitOfMeasurement=metric&nextBusinessDay=false";

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Authorization: Basic ",
            "Message-Reference: d0e7832e-5c98-11ea-bc55-0242ac13",
        ],
    ]);
    /* 
      I have only DHL_API_KEY and DHL_API_SECRET It asking me Authorization: Basic
    */

    $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        dd("cURL Error #:" . $err);
    } else {
        $rate = collect(json_decode($response));
        dd($rate);
    }

        return $rate;
    }
    public function createShippment($from, $to, $contactInfo)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api-mock.dhl.com/mydhlapi/shipments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $this->prepareData(''),
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic ZGVtby1rZXk6ZGVtby1zZWNyZXQ=",
                "Message-Reference: d0e7832e-5c98-11ea-bc55-0242ac13",
                "Message-Reference-Date: Wed, 21 Oct 2015 07:28:00 GMT",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $response =  "cURL Error #:" . $err;
        } else {
            $response = json_decode($response);
        }
        return $response;
    }
    public function prepareData($data)
    {
        $sample =  '{
            "plannedShippingDateAndTime": "2019-08-04T14:00:31GMT+01:00",
            "pickup": {
              "isRequested": false,
              "closeTime": "18:00",
              "location": "reception",
              "pickupDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
                "registrationNumbers": [
                  {
                    "typeCode": "VAT",
                    "number": "CZ123456789",
                    "issuerCountryCode": "CZ"
                  }
                ],
                
                "typeCode": "business"
              },
              "pickupRequestorDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "P1rague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
                "registrationNumbers": [
                  {
                    "typeCode": "VAT",
                    "number": "CZ123456789",
                    "issuerCountryCode": "CZ"
                  }
                ],
                
                "typeCode": "business"
              }
            },
            "productCode": "D",
            "localProductCode": "D",
            "getRateEstimates": false,
            "accounts": [
              {
                "typeCode": "shipper",
                "number": "123456789"
              }
            ],
            
            "outputImageProperties": {
              "printerDPI": 300,
              "customerBarcodes": [
                {
                  "content": "barcode content",
                  "textBelowBarcode": "text below barcode",
                  "symbologyCode": "93"
                }
              ],
              "customerLogos": [
                {
                  "fileFormat": "PNG",
                  "content": "base64 encoded image"
                }
              ],
            },
            "customerReferences": [
              {
                "value": "Customer reference",
                "typeCode": "CU"
              }
            ],
            "identifiers": [
              {
                "typeCode": "shipmentId",
                "value": "1234567890",
                "dataIdentifier": "00"
              }
            ],
            "customerDetails": {
              "shipperDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
              },
              "receiverDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
              },
              "buyerDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "buyer@domain.com",
                  "phone": "+44123456789",
                  "mobilePhone": "+42123456789",
                  "companyName": "Customer Company Name",
                  "fullName": "Mark Companer"
                },
              },
              "importerDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
                "registrationNumbers": [
                  {
                    "typeCode": "VAT",
                    "number": "CZ123456789",
                    "issuerCountryCode": "CZ"
                  }
                ],
                "bankDetails": [
                  {
                    "name": "Russian Bank Name",
                    "settlementLocalCurrency": "RUB",
                    "settlementForeignCurrency": "USD"
                  }
                ],
                "typeCode": "business"
              },
              "exporterDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
                "registrationNumbers": [
                  {
                    "typeCode": "VAT",
                    "number": "CZ123456789",
                    "issuerCountryCode": "CZ"
                  }
                ],
                "bankDetails": [
                  {
                    "name": "Russian Bank Name",
                    "settlementLocalCurrency": "RUB",
                    "settlementForeignCurrency": "USD"
                  }
                ],
                "typeCode": "business"
              },
              "sellerDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
                "registrationNumbers": [
                  {
                    "typeCode": "VAT",
                    "number": "CZ123456789",
                    "issuerCountryCode": "CZ"
                  }
                ],
                "bankDetails": [
                  {
                    "name": "Russian Bank Name",
                    "settlementLocalCurrency": "RUB",
                    "settlementForeignCurrency": "USD"
                  }
                ],
                "typeCode": "business"
              },
              "payerDetails": {
                "postalAddress": {
                  "postalCode": "14800",
                  "cityName": "Prague",
                  "countryCode": "CZ",
                  "provinceCode": "CZ",
                  "addressLine1": "V Parku 2308/10",
                  "addressLine2": "addres2",
                  "addressLine3": "addres3",
                  "countyName": "Central Bohemia",
                  "provinceName": "Central Bohemia",
                  "countryName": "Czech Republic"
                },
                "contactInformation": {
                  "email": "that@before.de",
                  "phone": "+1123456789",
                  "mobilePhone": "+60112345678",
                  "companyName": "Company Name",
                  "fullName": "John Brew"
                },
                "registrationNumbers": [
                  {
                    "typeCode": "VAT",
                    "number": "CZ123456789",
                    "issuerCountryCode": "CZ"
                  }
                ],
                "bankDetails": [
                  {
                    "name": "Russian Bank Name",
                    "settlementLocalCurrency": "RUB",
                    "settlementForeignCurrency": "USD"
                  }
                ],
                "typeCode": "business"
              }
            },
            "content": {
              "packages": [
                {
                  "typeCode": "2BP",
                  "weight": 22.501,
                  "dimensions": {
                    "length": 15.001,
                    "width": 15.001,
                    "height": 40.001
                  },
                  "customerReferences": [
                    {
                      "value": "Customer reference",
                      "typeCode": "CU"
                    }
                  ],
                  "identifiers": [
                    {
                      "typeCode": "shipmentId",
                      "value": "1234567890",
                      "dataIdentifier": "00"
                    }
                  ],
                  "description": "Piece content description",
                  "labelBarcodes": [
                    {
                      "position": "left",
                      "symbologyCode": "93",
                      "content": "string",
                      "textBelowBarcode": "text below left barcode"
                    }
                  ],
                  "labelText": [
                    {
                      "position": "left",
                      "caption": "text caption",
                      "value": "text value"
                    }
                  ],
                  "labelDescription": "bespoke label description"
                }
              ],
              "isCustomsDeclarable": true,
              "declaredValue": 150,
              "declaredValueCurrency": "CZK",
              "exportDeclaration": {
                "lineItems": [
                  {
                    "number": 1,
                    "description": "line item description",
                    "price": 150,
                    "quantity": {
                      "value": 1,
                      "unitOfMeasurement": "BOX"
                    },
                    "commodityCodes": [
                      {
                        "typeCode": "outbound",
                        "value": "HS1234567890"
                      }
                    ],
                    "exportReasonType": "permanent",
                    "manufacturerCountry": "CZ",
                    "exportControlClassificationNumber": "US123456789",
                    "weight": {
                      "netValue": 10,
                      "grossValue": 10
                    },
                    "isTaxesPaid": true,
                    "additionalInformation": [
                      "string"
                    ],
                    "customerReferences": [
                      {
                        "typeCode": "AFE",
                        "value": "custref123"
                      }
                    ],
                    "customsDocuments": [
                      {
                        "typeCode": "972",
                        "value": "custdoc456"
                      }
                    ]
                  }
                ],
                "invoice": {
                  "number": "12345-ABC",
                  "date": "2020-03-18",
                  "signatureName": "Brewer",
                  "signatureTitle": "Mr.",
                  "signatureImage": "Base64 encoded image",
                  "instructions": [
                    "string"
                  ],
                  "customerDataTextEntries": [
                    "string"
                  ],
                  "totalNetWeight": 999999999999,
                  "totalGrossWeight": 999999999999,
                  "customerReferences": [
                    {
                      "typeCode": "CU",
                      "value": "custref112"
                    }
                  ],
                  "termsOfPayment": "100 days"
                },
                "remarks": [
                  {
                    "value": "declaration remark"
                  }
                ],
                "additionalCharges": [
                  {
                    "value": 10,
                    "caption": "fee",
                    "typeCode": "freight"
                  }
                ],
                "destinationPortName": "port details",
                "placeOfIncoterm": "port of departure or destination details",
                "payerVATNumber": "12345ED",
                "recipientReference": "recipient reference",
                "exporter": {
                  "id": "123",
                  "code": "EXPCZ"
                },
                "packageMarks": "marks",
                "declarationNotes": [
                  {
                    "value": "up to three declaration notes"
                  }
                ],
                "exportReference": "export reference",
                "exportReason": "export reason",
                "exportReasonType": "permanent",
                "licenses": [
                  {
                    "typeCode": "export",
                    "value": "license"
                  }
                ],
                "shipmentType": "personal",
                "customsDocuments": [
                  {
                    "typeCode": "972",
                    "value": "custdoc445"
                  }
                ]
              },
              "description": "shipment description",
              "USFilingTypeValue": "12345",
              "incoterm": "DAP",
              "unitOfMeasurement": "metric"
            },
            "documentImages": [
              {
                "typeCode": "INV",
                "imageFormat": "PDF",
                "content": "base64 encoded image"
              }
            ],
            "onDemandDelivery": {
              "deliveryOption": "servicepoint",
              "location": "front door",
              "specialInstructions": "ringe twice",
              "gateCode": "1234",
              "whereToLeave": "concierge",
              "neighbourName": "Mr.Dan",
              "neighbourHouseNumber": "777",
              "authorizerName": "Newman",
              "servicePointId": "SPL123",
              "requestedDeliveryDate": "2020-04-20"
            },
            "requestOndemandDeliveryURL": false,
            "shipmentNotification": [
              {
                "typeCode": "email",
                "receiverId": "receiver@email.com",
                "languageCode": "eng",
                "languageCountryCode": "UK",
                "bespokeMessage": "message to be included in the notification"
              }
            ],
        }';
        $sample = objectToArray(json_decode($sample));
        
        return json_encode($sample);
    }
}
