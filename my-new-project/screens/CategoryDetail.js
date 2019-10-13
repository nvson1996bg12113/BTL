import React from 'react';
import {View, ScrollView, Text, FlatList, Image, Dimensions} from 'react-native';
import styles from '../assets/Style';
import System from '../components/System';
const win = Dimensions.get('window');
export default class CategoryDetail extends React.Component{
  constructor(props)
  {
    super(props);
    this.state={
      products: [],
      isLoading: true,
      id: this.props.navigation.getParam('categoryId', 'NO-ID'),
      page: this.props.navigation.getParam('page', 1)
    }
  }

  static navigationOptions = {
    title: 'Category Detail',
    headerStyle: {
      backgroundColor: 'rgba(54, 70, 255, 0.4)',
      display: 'none',
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'normal',
    },
  };
  _getData()
  {
    fetch('http://10.0.3.2:8080/demo/graph/category/products?id='+this.state.id+'&fields=id,name,key,media,category,price,viewer', {
        method: 'GET',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
      }).then((response) => response.json())
        .then((responseJson) => {
          this.setState({products: responseJson.data, isLoading: false});
          return responseJson;
        })
        .catch((error) => {
          console.error(error);
        });
  }
  componentDidMount(){
    this._getData();
  }
  showItem(item)
  {
    return (
      <View style={{width:'50%', backgroundColor: 'white', padding: 10, margin: 5}}>
        <Image
          source={{uri: 'http://10.0.3.2:8080/demo/storage/app/images/products/'+item.id+'/'+item.media[0].name}}
          style={{
            flex: 1,
            height: 200,
            marginBottom: 15
          }}
          resizeMode={'contain'}
        />
        <View>
          <View>
            <Text style={{fontSize: 12, fontWeight: 'normal'}}>{item.name}</Text>
            <Text style={{fontSize: 20, color: 'red', opacity: 0.6, fontWeight: 'bold'}}>{item.price} đ</Text>
          </View>
        </View>
      </View>
    );
  }
  render(){
      if(this.state.isLoading == false)
        return (
          <View style={styles.container}>
            <ScrollView style={{padding: 10}}>
            <View style={{width: '100%'}}>
              <FlatList
                data={this.state.products}
                horizontal={false}
                numColumns={2}
                renderItem={({item}) => this.showItem(item)}
                keyExtractor = { (item, index) => index.toString() }
              />
            </View>
            </ScrollView>
          </View>
        );
      else return(<View><Text>Loading</Text></View>);
  }
}
