define({ "api": [  {    "type": "get",    "url": "/menu/list",    "title": "获取菜单列表",    "name": "MenuList",    "group": "Menu",    "success": {      "fields": {        "Success 200": [          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "code",            "description": "<p>返回码</p>"          },          {            "group": "Success 200",            "type": "String",            "optional": false,            "field": "message",            "description": "<p>返回信息</p>"          },          {            "group": "Success 200",            "type": "Array",            "optional": false,            "field": "data",            "description": "<p>返回数据</p>"          }        ]      },      "examples": [        {          "title": "Success-Response:",          "content": "HTTP/1.1 200 OK\n{\n  \"code\": 200,\n  \"message\": \"成功\"\n  \"data\": [\n      {\n          \"id\": 1,\n          \"name\": 1,\n          \"url\": 1,\n          \"sort\": 1,\n          \"pid\": 1,\n          \"created_at\": 1,\n          \"updated_at\": 1,\n          \"deleted_at\": 1,\n          \"child_menu\": [\n               \"id\": 1,\n               \"name\": 1,\n               \"url\": 1,\n               \"sort\": 1,\n               \"pid\": 1,\n          ],\n      }\n  ]\n}",          "type": "json"        }      ]    },    "version": "0.0.0",    "filename": "./Controllers/Api/MenuController.php",    "groupTitle": "Menu"  }] });
