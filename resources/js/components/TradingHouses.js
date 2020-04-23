import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TradingHouses extends Component {

    constructor(){  
        super();  
        this.state = {  
            isLoaded: false,
            models: []
        };  
    }

    componentDidMount() {
      fetch(process.env.MIX_APP_API_URL + '/trading-house')
        .then(res => res.json())
        .then(
          (result) => {
              console.log(result);
            this.setState({
              isLoaded: true,
              models: result
            });
          },
          (error) => {
            // this.setState({
            //   isLoaded: true,
            //   error
            // });
          }
        )
    }

    render() {

        let listItems = this.state.models.map((model) =>
            <div key={model.id}>
                <div className="td-slider__block">
                    <div className="td-slider__img-wrapper">
                        <img src={process.env.MIX_APP_STORAGE_URL + '/' + model.logo}/>
                    </div>
                    <div className="separator"></div>
                    <h2>{model.name}</h2>
                </div>
            </div>
        );

        return (listItems);
    }
}

if (document.getElementById('trading-houses')) {
    ReactDOM.render(<TradingHouses />, document.getElementById('trading-houses'));
}
