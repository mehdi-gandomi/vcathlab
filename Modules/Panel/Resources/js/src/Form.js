import Form from 'form-backend-validation';
class CustomForm{
    constructor(fields,options={}){
        return new Form(fields,{
            http:window.Iracode.getHttp()
        });
    }
}
export default CustomForm;
