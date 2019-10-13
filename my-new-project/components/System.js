import React from 'react';
import {AsyncStorage} from 'react-native'
export default class System extends React.Component{
  static User = {
      auth: false,
      data: {
        avata: null,
        cover: null,
        created_at: null,
        email: null,
        id: null,
        name: null,
        phone: null,
        updated_at: null
      }
  };
  async checkAuth()
  {
    try{
      let getAsyncAuth = await AsyncStorage.getItem('auth');
      let auth = JSON.parse(getAsyncAuth);
      if(auth != null)
      {
        this.setState({user: auth});
      }
    }catch(error)
    {
      console.error(error);
    }
    this._getData();
  }
  componentDidMount()
  {
    this.checkAuth();
  }
}
