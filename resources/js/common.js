import Axios from "axios"


export default {
    data() {
        return {

        }
    },
    methods: {
        async callApi(method, url, dataObj) {
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObj

                });
            } catch (error) {
                return error.response
            }



        },
        // Notification Api
        toast(message, type) {
            Vue.$toast.open({
                message: message,
                type: type,
                // all of other options may go here
            });
        },
        toastFetchData() {
            Vue.$toast.open({
                message: 'Data fetched successfully',
                type: 'success',
                // all of other options may go here
            });
        }
    },
}