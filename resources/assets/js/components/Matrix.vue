<template>
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="spacing2"></div>
                <div class="col-md-1" v-for="(no, key) in no1" :key="`no-${key}`">
                    {{no}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="row" style="margin-bottom: 25px;" v-for="(no, key) in no2" :key="`no-${key}`">
                        {{no}}
                    </div>
                </div>
                <div class="col-md-10">
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            a: Number,
            b: Number,
            ac: Number,
            bc: Number,
            no1: Object,
            no2: Object,
            arr: Array,
            sum: Number,
        },
        methods: {
            objectToArr(obj) {
                var result = Object.keys(obj).map(function(key){
                    return [Number(key), obj[key]]
                })
                return result
            },
            display() {

            }
        },
        data() {
            return {
                items: [
                    this.a, this.b, this.ac, this.bc, this.x, this.y, this.arr, this.sum
                ]
            }
        }
    }
</script>
