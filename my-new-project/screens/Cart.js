import React from 'react';
import {View, FlatList, Image, TouchableOpacity, ScrollView} from 'react-native';
import System from '../components/System';
import { Avatar, Text, Button } from 'react-native-elements';
import styles from '../assets/Style';
export default class Cart extends System{
  constructor(props)
  {
    super(props);
    this.state = {
      user: System.User,
      cart: []
    }
  }
  static navigationOptions={
    headerStyle: {
      backgroundColor: 'rgba(71, 126, 245, 0.8)',
      display: 'none'
    },
    headerTintColor: 'white'
  };
  _getData()
  {
    fetch('http://10.0.3.2:8080/demo/graph/order/user/'+this.state.user.data.id)
    .then((response) => response.json())
    .then((responseJson) => {
      this.setState({cart: responseJson.data.detail});
      return responseJson;
    })
    .catch((error) => {
      console.error(error);
    });
  }
  handleBonusProductInCart(index)
  {
    console.log("Bonus product in index of cart");
    const cart = this.state.cart;
    cart[index].number++;
    this.setState({cart: cart});
    console.log(this.state.cart);
  }
  showItem(item, index)
  {
    console.log(index);
    return (
      <View style={{backgroundColor: 'white', paddingLeft: 15, paddingRight: 15, paddingTop: 5, paddingBottom: 5  , marginTop: 15, flexDirection: 'row'}}>
        <TouchableOpacity style={{width: '30%', padding: 5, marginRight: 5}}
          onPress={() => this.props.navigation.navigate('ProductDetail',{productId: item.product.id})}
        >
          <Image
            source={{uri: 'http://10.0.3.2:8080/demo/storage/app/images/products/'+item.product.id+'/'+item.product.media[0].name}}
            style={{
              flex: 1,
              height: 70,
            }}
            resizeMode={'contain'}
          />
        </TouchableOpacity>
        <View style={{flexDirection: 'column', width: '70%'}}>
          <Text h4 h4Style={{fontWeight: 'normal', fontSize: 15, marginBottom: 15}} onPress={() => this.props.navigation.navigate('ProductDetail',{productId: item.product.id})}>{item.product.name}</Text>
          <View style={{flexDirection: 'row', marginBottom: 15}}>
            <Text style={{fontWeight: 'normal', fontSize: 10, color: 'blue', marginRight: 10, fontStyle: 'italic', opacity: 0.7, lineHeight: 20}}>Số lượng:</Text>
            <View style={{flexDirection: 'row'}}>
              <Button
                buttonStyle={{ height: 20, width: 30, paddingTop: 5}}
                titleStyle={{fontSize: 15, fontWeight: 'normal', color: 'black'}}
                title="+"
                type="outline"
                onPress={() => this.handleBonusProductInCart(index)}
                />
                <Text style={{fontWeight: 'normal', fontSize: 10, color: 'gray', lineHeight: 20, paddingLeft: 15, paddingRight: 15}}>{item.number}</Text>
                <Button
                  buttonStyle={{ height: 20, width: 30, paddingTop: 5}}
                  titleStyle={{fontSize: 15, fontWeight: 'normal', color: 'black'}}
                  title="-"
                  type="outline"
                  />
            </View>
          </View>
          <View style={{borderTopWidth: 1, borderTopColor: 'lightgray'}}>
            <View style={{alignSelf: 'flex-end', flexDirection: 'row'}}>
              <Text style={{fontSize: 10, lineHeight: 21}}>{item.price_total}</Text>
              <Text style={{color: 'gray'}}> đ</Text>
            </View>
          </View>
        </View>
      </View>
    );
  }
  render()
  {
    return (
      <View style={styles.container}>
        <Text style={{color: 'lightblue', marginTop: 35, marginLeft: 15, marginBottom: 15}} onPress={()=>this.props.navigation.navigate("MyHome")}>Trang chủ</Text>
        <View style={{backgroundColor: 'white', padding: 15, flexDirection: 'row'}}>
          <Avatar rounded source={require('../assets/avataUser.png')} size="medium"/>
          <View style={{marginLeft: 20}}>
            {this.state.user.data.name? <Text style={{fontSize: 16}}>{this.state.user.data.name}</Text> : null}
            {this.state.user.data.email? <Text style={{color: 'gray', fontSize: 10}}>{this.state.user.data.email}</Text> : null}
          </View>
        </View>
        <ScrollView style={{flex: 1}}>
          <FlatList
            data={this.state.cart}
            renderItem = {({item, index}) => this.showItem(item, index)}
            extraData={this.state.cart}
          />
        </ScrollView>
      </View>
    );
  }
}
