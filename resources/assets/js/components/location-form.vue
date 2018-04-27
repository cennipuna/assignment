<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">Weather Focaster</div>

                    <div class="card-body">
                        <div class="form-group">
                        <span>Latitude</span><input v-model="lat" type="text" required="required" class="form-control" id="latitiude" placeholder="Enter Latitude">
                        </div>
                        <div class="form-group">
                        <span>Longtitude</span><input v-model="long" type="text" required="required" class="form-control" id="longtitude" placeholder="Enter Longtitude">
                        </div>
                        <div class="form-group">
                        <span>Days</span><input v-model="days" type="text" required="required" id="num-days" class="form-control" placeholder="Enter Number of Days">
                        </div>
                        <button v-on:click='getInfo'  class="btn btn-primary">Submit</button>
                        <button v-on:click='clearForm'  class="btn btn-warning">Clear</button>
                        <!--<b-btn v-on:click='getInfo' v-b-modal.center variant="primary">Submit</b-btn>-->

                    </div>
                    <div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row panel justify-content-center">
            <pulse-loader :loading="loading" :color="color" :size="size" v-if="before_requests !== null && after_requests == null "></pulse-loader>
        <table class="table" v-if="after_requests">
            <thead>
            <tr>
                <th scope="col">Date & time</th>
                <th scope="col">Summary</th>
                <th scope="col">Sunrise Time</th>
                <th scope="col">Sunset Time</th>
                <th scope="col">Temperature High</th>
                <th scope="col">Temperature Low</th>
                <th scope="col">Dew Point</th>
                <th scope="col">Humidity</th>
                <th scope="col">Pressure</th>
                <th scope="col">Wind Speed</th>
                <th scope="col">Cloud cover</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <th scope="row">{{ item.data.time | moment("dddd, MMMM Do YYYY")}}</th>
                <td>{{ item.data.summary}}</td>
                <td>{{ item.data.sunriseTime | moment("h:mm:ss a")}}</td>
                <td>{{ item.data.sunsetTime | moment("h:mm:ss a")}}</td>
                <td>{{ item.data.temperatureHigh}}</td>
                <td>{{ item.data.temperatureLow}}</td>
                <td>{{ item.data.dewPoint}}</td>
                <td>{{ item.data.humidity}}</td>
                <td>{{ item.data.pressure}}</td>
                <td>{{ item.data.windSpeed}}</td>
                <td>{{ item.data.cloudCover}}</td>
            </tr>

            </tbody>
        </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lat: '',
                long: '',
                days: '',
                before_requests: null,
                after_requests: null,
                items: []
            }
        },
        mounted() {

        },
        methods: {
            getInfo: function () {
                this.before_requests = 1;
                axios.all(this.getPromises()).then(response => {
                    this.items = response;
                    this.after_requests = 1;
                });
            },
            getPromises: function () {
                let promises = [];
                let url = '/api/weather/' + this.lat + '/' + this.long;

                let i;
                for (i = 0; i < this.days; i++) {
                    promises.push(axios.get(url + '/' + i))
                }

                return promises;
            },
            clearForm: function () {
               this.lat = '';
               this.long = '';
               this.days = '';
               this.before_requests = null;
               this.after_requests = null;
               this.items = [];
            },
        }
    }
</script>
