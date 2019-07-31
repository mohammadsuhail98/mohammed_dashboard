## Routes and how to use 


>Any routes has a AUTH Keyword should has the following headers

**Authorization : Bearer UR TOKEN**

>Any routes has a ONLY ADMIN thats mean the user can't access the route 

# IF there is any issue in the API or FrontEnd let me know so i can help with it.

> THE BASE UR IS in localHost 127.0.0.1/api/v1/

#### WHEN you use the postman should u include the Accpte & Content type as a application/json


--------------------------

#### Registration Routes

1.Login 
- Method POST 
- URL : /login 
Params : 
        - email : string|required,
        - password: string|required

2.SignUp
- Method POST ** 
- URL : /registration **
Params : 
        - name : string|required
        - email : string|required,
        - password: string|required|min:6, 
        - phone : string|nullable|between10-11,
        
3.Logout
- Method POST 
- URL : /logout 
Params: 


#### User Routes 

1.GetUserProfile **AUTH**
 * Method : GET 
 * URL : /user
 Params : 

2. Get Users (ONLY ADMIN) **AUTH**
- METHOD : GET 


### Form

1.Add Form **AUTH**
* Method : POST
* URL : /form_details
Params : 
    ###### ALL THE DATA 

2.Get Forms(ONLY ADMIN) **AUTH**
* Method: GET
* URL : forms_details

3.Get Single Form **AUTH**
* Method : GET
* URL : single_form

