import React from 'react';
import {View, Text, AsyncStorage} from 'react-native';
import { Avatar, Input, Button } from 'react-native-elements';
import Icon from 'react-native-vector-icons/FontAwesome';
import { StackActions, NavigationActions } from 'react-navigation';
import styles from '../assets/Style';
import System from '../components/System';
export default class EditProfile extends System{
  constructor(props)
  {
    super(props);
    this.state = {
      user: System.User,
      auth: false,
      avata: null,
      cover: null,
      created_at: null,
      email: null,
      id: null,
      name: null,
      phone: null,
      updated_at: null,

      errorInput: {
        name: "",
        phone: ""
      },
      submit: false
    };
  }
  static navigationOptions={
    title: 'Chỉnh sửa thông tin',
    headerStyle: {
      backgroundColor: 'rgba(71, 126, 245, 0.8)',
    },
    headerTintColor: 'white',
  };
  _getData()
  {
        this.setState({
          auth: this.state.user.auth,
          avata: this.state.user.data.avata,
          cover: this.state.user.data.cover,
          created_at: this.state.user.data.created_at,
          email: this.state.user.data.email,
          id: this.state.user.data.id,
          name: this.state.user.data.name,
          phone: this.state.user.data.phone,
          updated_at: this.state.user.data.updated_at,});
  }
  async submit(){
    let data = this.state;
    let body = {
      avata: data.avata,
      cover: data.cover,
      created_at: data.created_at,
      email: data.email,
      id: data.id,
      name: data.name,
      phone: data.phone,
      updated_at: data.updated_at
    };

    let result = await fetch('http://10.0.3.2:8080/demo/graph/user/update', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(body),
      }).then((response) => response.json())
        .then((responseJson) => {
          return responseJson;
        })
        .catch((error) => {
          console.error(error);
        });
    if(result == 1)
    {
      try{
        this.setState({submit: true});
        await AsyncStorage.setItem('auth', JSON.stringify({auth: true, data: data}));
        const navigateAction = NavigationActions.navigate({
          routeName: 'MyHome',
          action: NavigationActions.navigate({ routeName: 'User', params: {reload: true} }),
        });

        this.props.navigation.dispatch(navigateAction);
        this.setState({submit: false});
      }catch(error)
      {
        console.error(error);
      }
    }
  }
  render()
  {
    if(this.state.auth == false)
      return(
        <View>
          <Text>Bạn cần phải đăng nhập!</Text>
        </View>
      );
    return (
      <View style={styles.container}>
        <View style={{alignItems:'center', padding: 15}}>
          <View style={styles.formGroup}>
            <Avatar rounded source={require('../assets/avataUser.png')} size="xlarge"/>
          </View>
          <Text style={{textAlign: 'left', width: '100%', fontSize: 14, marginTop: 25, marginBottom: 20}}>Thông tin cơ bản</Text>
          <View style={styles.formGroup}>
            <Input
              inputContainerStyle={{height: 20}}
              label="Họ và tên"
              labelStyle={{fontSize: 10, fontWeight: 'normal'}}
              inputStyle={{fontSize: 12, paddingLeft: 10, paddingRight: 10}}
              value={this.state.name}
              onChangeText={(name) => this.setState({name})}
              errorStyle={{ color: 'red' , fontSize: 9}}
              errorMessage={this.state.errorInput.name}
            />
          </View>
          <View style={styles.formGroup}>
            <Input
              inputContainerStyle={{height: 20}}
              label="Số điện thoại"
              labelStyle={{fontSize: 10, fontWeight: 'normal'}}
              inputStyle={{fontSize: 12, paddingLeft: 10, paddingRight: 10}}
              value={this.state.phone}
              placeholder="0x00000000"
              onChangeText={(phone) => this.setState({phone})}
              errorStyle={{ color: 'red' , fontSize: 9}}
              errorMessage={this.state.errorInput.phone}
            />
          </View>
        </View>
        <Button
          buttonStyle={{alignSelf: 'flex-end', marginRight: 30}}
          title="Xác nhận"
          type="clear"
          onPress={() => this.submit()}
          loading={this.state.submit}
        />
      </View>
    );
  }
}
