<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" @click="onGetAsset">Index Asset</div>

                    <div class="panel-body">
                        {{asset}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                asset : []
            }
        },
        methods: {
            onGetAsset() {
                axios.get('http://localhost:8000/api/asset/')
                    .then(function (response) {
                         this.data().asset = response.data;
                         console.log(this.data().asset);
                    })
                    .catch(
                        error => console.log(error)
                    );
            },
        }
    }
</script>
