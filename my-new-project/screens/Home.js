import React from 'react';
import {Button, StyleSheet, Text, View, TouchableOpacity, Image, FlatList, ScrollView} from 'react-native';
import styles from '../assets/Style';
import { createStackNavigator, createAppContainer } from 'react-navigation';
import System from '../components/System';
import FontAwesome from 'react-native-vector-icons/FontAwesome';
export default class HomeScreen extends System {
  constructor(props){
      super(props);
      this.state = {
        user: System.User,
        product: {
          data: [],
          isLoading: false
        },
        category:{
          data: [],
          isLoading: true
        }
      }
    }
    _getCategoryData(){
      fetch('http://10.0.3.2:8080/demo/graph/category/all?fields=id,name,description,key,icon')
      .then((response) => response.json())
      .then((responseJson) => {
        let res = {data: responseJson.data, isLoading: false};
        this.setState({category: res});
        return responseJson;
      })
      .catch((error) => {
        console.error(error);
      });
    }
    _getProductData(){
      fetch('http://10.0.3.2:8080/demo/graph/product/paginate?paginate=15&fields=id,name,key,media,category,price,viewer', {
          method: 'GET',
          headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
          },
        }).then((response) => response.json())
          .then((responseJson) => {
            let res = {data: responseJson.data, isLoading: true};
            this.setState({product: res});
            return responseJson;
          })
          .catch((error) => {
            console.error(error);
          });
    }
    showProductItem(item){
      const rootNav = this.props.screenProps.rootNavigation;
      return(
        <TouchableOpacity style={{width: 100, padding: 5, marginRight: 5}}
          onPress={() => rootNav.navigate('ProductDetail',{productId: item.id})}
        >
          <Image
            source={{uri: 'http://10.0.3.2:8080/demo/storage/app/images/products/'+item.id+'/'+item.media[0].name}}
            style={{
              flex: 1,
              height: 70,
              marginBottom: 15
            }}
            resizeMode={'contain'}
          />
          <Text style={{textAlign: 'center', fontSize: 13}}>{item.name}</Text>
          <Text style={{textAlign: 'center', fontSize: 13}}>{item.price} đ</Text>
        </TouchableOpacity>
      );
    }
    componentDidMount(){
        this._getCategoryData();
        this._getProductData();
      }
  render() {
    return (
      //() => this.props.navigation.openDrawer()
      <View style={styles.container}>
        <View style={{height: 100, backgroundColor: 'rgba(71, 126, 245, 0.8)', justifyContent: 'space-between', alignItems: 'center'}}>
          <View
            style={{height: 40, width: '80%',marginTop: 40, backgroundColor: 'white',borderRadius: 5,  paddingLeft: 15, paddingRight: 15, flexDirection: 'row', paddingTop: 3, paddingBottom: 3}}
            onPress={() => this.props.navigation.navigate('Search')}
          >
            <FontAwesome name={'search'} style={{lineHeight: 34, paddingRight: 15, color: 'lightgray', borderRightWidth: 1, borderRightColor: 'lightgray'}}/>
            <Text style={{lineHeight: 34, color: 'lightgray', paddingLeft: 15}}   onPress={() => this.props.navigation.navigate('Search')}>Tìm kiếm</Text>
          </View>
        </View>
        <View style={styles.container}>

          {this.state.product.isLoading?
            <View
              style={{backgroundColor: 'white', margin: 7, borderRadius: 5, padding: 7}}
            >
              <View style={{marginTop: 5, marginBottom: 5}}>
                <Text>Tất cả sản phẩm</Text>
              </View>
              <ScrollView
                horizontal={true}
                showsHorizontalScrollIndicator={false}
              >
                <FlatList
                  horizontal={false}
                  numColumns = {5}
                  data={this.state.product.data}
                  renderItem={({item}) =>  this.showProductItem(item)}
                  keyExtractor = { (item, index) => index.toString() }
                />
              </ScrollView>
              <View style={{marginTop: 5, marginBottom: 5}}>
                <Text style={{textAlign: 'right', color: 'blue'}}>Xem thêm</Text>
              </View>
            </View> : null}
        </View>
      </View>
    );
  }
}
