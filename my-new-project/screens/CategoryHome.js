import React from 'react';
import {View, Text, FlatList, StyleSheet, TouchableOpacity, Image, ScrollView} from 'react-native';
import styles from '../assets/Style';
import System from '../components/System';
export default class CategoryHome extends React.Component{
  constructor(props){
    super(props);
    this.state = {
      categorys: [],
      isLoading: true
    };
  }
  static navigationOptions = {
    title: 'Category',
    headerStyle: {
      backgroundColor: 'rgba(54, 70, 255, 0.4)',
      display: 'none'
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'normal',
    },
  };
  _getData()
  {
    fetch('http://10.0.3.2:8080/demo/graph/category/all?fields=id,name,description,key,icon', {
        method: 'GET',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
      }).then((response) => response.json())
        .then((responseJson) => {
          this.setState({categorys: responseJson.data, isLoading: false});
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
      <TouchableOpacity style={{width: '33.333%',alignItems: 'center', padding: 15}}
        onPress={
          () => this.props.navigation.navigate('CategoryDetail',{
            categoryId: item.id,
            page: 1
          })
        }
      >
      <View style={{width: '100%', alignItems: 'center', padding: 10, borderRadius: 4, backgroundColor: 'rgba(237, 237, 237,0.5)'}}>
        <Image style={{width: 50, height: 50, }} source={{uri: 'http://10.0.3.2:8080/demo/storage/app/images/icon/'+item.icon}} />
        <Text style={{fontSize: 12, marginTop: 10}}>{item.name}</Text>
      </View>
      </TouchableOpacity>
    );
  }
  render()
  {
    if(this.state.isLoading == false)
      return (
        <View style={styles.container}>
          <ScrollView style={{marginTop: 25}}>
            <View style={{width: '100%'}}>
              <FlatList
                horizontal = {false}
                numColumns = {3}
                data={this.state.categorys}
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
