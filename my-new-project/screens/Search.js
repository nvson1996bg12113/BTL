import React from 'react';
import {View, TextInput, TouchableOpacity, FlatList, Text} from 'react-native';
import styles from '../assets/Style';
import FontAwesome from 'react-native-vector-icons/FontAwesome';
import { NavigationActions } from 'react-navigation';
import System from '../components/System';
export default class Search extends React.Component{
  constructor(props)
  {
    super(props);
    this.state={
      searchValue: '',
      product: []
    };
  }
  static navigationOptions = {
    title: 'Search',
    headerStyle: {
      backgroundColor: 'rgba(54, 70, 255, 0.4)',
      display: 'none'
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'normal',
    },
  };
  loadDataSearch = (content) =>
  {
    fetch('http://10.0.3.2:8080/demo/graph/product/all?fields=id,name,key&where='+content, {
        method: 'GET',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
      }).then((response) => response.json())
        .then((responseJson) => {
          this.setState({product: responseJson.data});
          return responseJson;
        })
        .catch((error) => {
          console.error(error);
        });
        this.setState({searchValue: content});
  }
  showItemSearch = (item) =>
  {
    const rootNav = this.props.screenProps.rootNavigation;
    return(
      <View style={{backgroundColor: 'white'}}>
        <Text style={{margin: 15, fontSize: 14, color: 'gray'}} onPress={()=> rootNav.navigate('ProductDetail',{productId: item.id})}>{item.name}</Text>
      </View>
    );
  }
  render()
  {
    return (
      <View style={styles.container}>
        <View style={{height: 100, backgroundColor: 'white', justifyContent: 'space-between', alignItems: 'center', borderBottomWidth: 1, borderBottomColor: 'lightgray'}}>
          <View  style={{height: 40, width: '80%',marginTop: 40, backgroundColor: 'white',borderRadius: 5,  paddingLeft: 15, paddingRight: 15, flexDirection: 'row', paddingTop: 3, paddingBottom: 3}}>
            <FontAwesome name={'search'} style={{lineHeight: 34, paddingRight: 15, color: 'lightgray', borderRightWidth: 1, borderRightColor: 'lightgray'}}/>
            <TextInput
              style={{lineHeight: 34, color: 'lightgray', paddingLeft: 15}}
              placeholder={'Tìm kiếm'}
              value = {this.state.searchValue}
                onChangeText={this.loadDataSearch.bind(this)}
            />
          </View>
        </View>
        <FlatList
          style={{ flex: 1}}
          data={this.state.product}
          renderItem = {({item}) =>  this.showItemSearch(item)}
          keyExtractor = { (item, index) => index.toString() }
          extraData={this.state.product}
        />
      </View>
    );
  }
}
