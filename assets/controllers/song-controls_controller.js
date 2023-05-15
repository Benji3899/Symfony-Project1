import { Controller } from '@hotwired/stimulus';
import axios from 'axios';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */

export default class extends Controller {
    //https://symfonycasts.com/screencast/symfony/stimulus-example#play
    static values = {
        infoUrl: String
    }

    play(event) {
        event.preventDefault();
        // console.log(this.infoUrlValue);
        axios.get(this.infoUrlValue)
            .then((response) => {
                const audio = new Audio(response.data.url);
                audio.play();
                // console.log(response);
            });
    }
}
