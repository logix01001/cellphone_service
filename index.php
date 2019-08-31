<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <h2>Sprint Cellphone Company Service</h2>
                    <hr>
                    <label for="service"><b>Acount #</b></label>
                    <input type="text" class="form-control" v-model="account_number">
                    <label for="service"><b>Service</b></label>
                    <select name="" class="form-control" v-model="selected_service" id="service">
                        <option value="">--Select Service--</option>
                        <option value="R">Regular</option>
                        <option value="P">Premium</option>
                    </select>
                    
                    <div v-if="selected_service == 'R'">  
                        <br> 
                        <h4>Basic Charge : $10.00</h4>
                        <label for="">Enter Minutes of Call (50Min Free | $0.20/min )</label>
                        <input type="text" class="form-control" v-model="service.regular_minute">
                        <button @click="get_receipt" class="btn btn-primary"> Check Receipt</button>
                    </div>
                    <div v-if="selected_service == 'P'">
                        <br>
                        <h4>Basic Charge : $25.00</h4>
                        <label for="">6:00AM - 6:00PM (75Min Free | $0.10/min )</label>
                        <input type="text" class="form-control" v-model="service.day_minute">
                        <label for="">6:00PM - 6:00AM (100Min Free | $0.50/min )</label>
                        <input type="text" class="form-control" v-model="service.night_minute">
                        <button @click="get_receipt" class="btn btn-primary"> Check Receipt</button>
                    </div>




                </div>
                
                <div class="col-lg-6 col-sm-6">
                    <div v-html="html">
                    </div>
                </div>
            </div>
           
        </div>
       
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script>

    <script>
        new Vue({
            el:'#app',
            data:{
              selected_service : '',
              account_number: '',
              service: {
                    regular_minute: '',
                    day_minute: '',
                    night_minute: ''
              },
              html: ''
            },
            computed:{
             
            },
            methods:{
                get_receipt(){
                    var self = this
                    axios.post(`${window.location.protocol}//${window.location.host}/phpclass/cellphone/service_post.php`,{
                        selected_service: self.selected_service,
                        service: self.service,
                        account_number: self.account_number
                    })
                    .then(res => {
                        self.html = res.data
                    })
                    .catch(err => {
                         console.error(err);
                    })
              
                }
            }
        })
    </script>
</body>
</html>