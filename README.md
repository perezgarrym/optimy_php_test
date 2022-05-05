# optimmy_php_test
Technical Exam on Eastvantage

## WHAT I DID

  - i create REST-API for news, separation between client and server, the protocol makes it easy for developments across a project to take place independently, if we decided to integrate it with other platform like mobile app this is ready for it.

  http://{{api-url}}/api.php/news/getnews

  - I apply HMVC (Hierarchical model–view–controller) structure for modules, so its more maintainable, v1 stands for version of REST-API if any big impact changes on the endpoint i suggest to create v2 on the module in that way old endpoint will remain. 

  - I move old source code to old_project folder, just for reference old structure. 

  - use bootstrap 5.1 as a basic template on view on index.php, also used jquery to render list thru ajax call. 