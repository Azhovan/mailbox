 
### Installation 

#### Prepare Project
* clone this repository
* go to root of the project and run the below commands.
* composer install 
* composer dump-autoload -o 
* php artisan key:generate

#### seed database 
* php artisan migrate
* php artisan db:seed
> by running the above commands data (messages_sample.json) will be inserted in the database and a user will be created for using the api, please use **username: test@oberlo.com** and **password: oberlo**

#### run the project
you can go to root of the project and use the command : **php artisan serv**
(note : you may create any virtual host also)


#### project structure 
```text
You can find all the codes inside the directory : app/mailBox
```

inside the app/mailBox you can find these files and folders :

* **Controllers** // the controller which is used by api
* **Exceptions** // exceptions which will be handled by api
* **Model** // database model
* **Response** // classes which are responsible to generate output based on different strategies
* **Services** // message abstraction and it's services
* 

#### Approach
the approach of creating the api can be summarized as below
##### **Domain** 
in this project there is only one domain, and it is **message**

##### **Design**
based on the senario design of api can be break down to below parts 
* **Base Url**  
the base url should be very simple and intuitive, so it just contains domain (**message**) and version (in this case **v1**).

* **Pagination, Filtering** as a best practice pagination and filtering was included in url
* **versioning** : the version attached to base url
* **Error Codes** two type of codes implemented 
 - Http response code 
 - Application response code
* **HATEOAS** : any GET response contains a unique url to that resourse
* **Response Format** : as a standard response, I followed up the [jsonapi.com](http://jsonapi.com) as data model (also for error and meta block)

| Http Method   |  Request                                                     | Description                                  |
| ------------- |:------------------------------------------------------------:| --------------------------------------------:|
| GET           | /api/v1/messages/{uid}                                       | get a message with specific uid|
| GET           | /api/v1/messages/                                            | get all messages               |
| GET           | /api/v1/messages/?offset={value}&&limit={value}&&status=read | get messages with custom offset, limit and status (read, unread, archived) |
| PUT           | api/v1/messages/{uid}/{new status}                           | update the status of custom email with uid identifier and new status (read, unread, archived) |

 
