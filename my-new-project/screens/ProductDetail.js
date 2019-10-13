import React from 'react';
import {View, Dimensions, FlatList, Image, ScrollView, Text, AsyncStorage} from 'react-native';
import styles from '../assets/Style';
import HTML from 'react-native-render-html';
import { Avatar, Rating, AirbnbRating, ListItem} from 'react-native-elements';
import HeaderForProductDetail from '../components/HeaderForProductDetail';
import System from '../components/System';
export default class ProductDetail extends System{
  constructor(props)
  {
    super(props);
    this.state={
      user: System.User,
      productId: this.props.navigation.getParam('productId', -1),
      isLoading: false,
      product: {},
      vote: {
        maxVote: 5,
        posts: null,
      },
      isLoadingVote: false
    };
  }
  static navigationOptions={
    headerStyle: {
      backgroundColor: 'rgba(71, 126, 245, 0.8)',
    },
    headerTintColor: 'white'
  };
  async _getData()
  {
    console.log(this.state);
    fetch('http://10.0.3.2:8080/demo/graph/product?id='+this.state.productId+'&fields=id,name,description,category,vendor,media,price,viewer', {
        method: 'GET',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
      })
    .then((response) => response.json())
    .then((responseJson) => {
      this.setState({product: responseJson.data});
      this.setState({isLoading: true});
      return responseJson;
    })
    .catch((error) => {
      console.error(error);
    });
    let apiGetVote = 'http://10.0.3.2:8080/demo/graph/vote?id='+this.state.productId;
    if(this.state.user.auth)
      apiGetVote+='&user_id='+this.state.user.data.id;
    console.log("API get vote for product detail: "+apiGetVote);
    fetch(apiGetVote)
    .then((response) => response.json())
    .then((responseJson) =>{
      console.log("get list vote for product detail");
      this.setState({vote: responseJson});
      this.setState({isLoadingVote: true});
      return responseJson;
    })
    .catch((error) =>{
      console.error(error);
    });
  }
  async ratingCompleted(rating) {
    const userId = this.state.user.data.id;
    const productId = this.state.productId;
    const {navigation} = this.props;
    let result = await fetch('http://10.0.3.2:8080/demo/vote/submit', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          user_id: userId,
          id: productId,
          vote: rating,
          content: "",
        }),
      }).then((response) => response.json())
        .then((responseJson) => {
          return responseJson;
        })
        .catch((error) => {
          console.error(error);
        });
    if(result >= 1)
    {
      let apiGetVote = 'http://10.0.3.2:8080/demo/graph/vote?id='+this.state.productId;
      if(this.state.user.auth)
        apiGetVote+='&user_id='+this.state.user.data.id;
      fetch(apiGetVote)
      .then((response) => response.json())
      .then((responseJson) =>{
        console.log("get list vote for product detail");
        console.log(responseJson);
        this.setState({vote: responseJson});
        this.setState({isLoadingVote: true});
        return responseJson;
      })
      .catch((error) =>{
        console.error(error);
      });
    }
  }
  showDetailProduct()
  {
    let screenWidth = Dimensions.get("window").width;
    let screenHeight = Dimensions.get("window").height;
    let halfScreenHeight = screenHeight / 2;
    return (
      <View>
        <View style={{width: screenWidth, paddingTop: 15, backgroundColor: 'white', marginBottom: 15}}>
          <ScrollView
          horizontal={true}
          showsHorizontalScrollIndicator={false}
          pagingEnabled={true}
          style={{marginBottom: 15}}
          >
            <FlatList
              data={this.state.product.media}
              horizontal={true}
              renderItem={({item}) =>
                <View style={{width: screenWidth, height: halfScreenHeight, paddingTop: 3}}>
                <Image
                  source={{uri: 'http://10.0.3.2:8080/demo/storage/app/'+item.path+'/'+item.name}}
                  style={{
                    flex: 1,
                    height: halfScreenHeight - 6,
                    padding: 15
                  }}
                  resizeMode={'contain'}
                />
                </View>
              }
              keyExtractor = { (item, index) => index.toString() }
            />
          </ScrollView>
          <View style={{padding: 15, marginBottom: 15 ,}}>
            <Text style={{fontSize: 23, textDecorationStyle: 'solid'}}>{this.state.product.name}</Text>
            <Text style={{fontSize: 20, marginTop: 15}}>{this.state.product.price} đ</Text>
            <View style={{flexDirection: 'row'}}>
              <Text style={{color: 'blue', fontSize: 10}}># {this.state.product.category.name}, {this.state.product.vendor.name}</Text>
            </View>
          </View>
        </View>
        {this.state.product.description != null?
          <View style={{width: screenWidth, paddingTop: 7, backgroundColor: 'white', marginBottom: 15, paddingRight: 15, paddingLeft: 15}}>
            <HTML html={this.state.product.description} imagesMaxWidth={Dimensions.get('window').width}/>
          </View>
          :null
        }
      </View>
    );
  }
  showListVotes()
  {
    return (<View style={{width: '100%', padding: 15, backgroundColor: 'white', marginBottom: 15}}>
      {this.state.user.auth?
        <View style={{marginBottom: 40}}>
          <Text>Đánh giá của bạn</Text>
            <AirbnbRating
            count={this.state.vote.maxVote}
            reviews={["Tồi", "Khá kém", "Bình thường", "Tốt", "Tuyệt vời"]}
            defaultRating={this.state.vote.yourVote!=null? this.state.vote.yourVote.vote : 0}
            size={20}
            onFinishRating={this.ratingCompleted.bind(this)}
          />
        </View>: null}
      <View  style={{marginBottom: 10, borderBottomWidth: 1, borderBottomColor: 'lightgray', paddingBottom: 15, flexDirection: 'row'}}>
        <Text style={{lineHeight: 35}}>Đánh giá của người dùng</Text>
        <Rating
          ratingColor='#3498db'
          ratingBackgroundColor='#c8c7c8'
          ratingCount={this.state.vote.maxVote}
          imageSize={15}
          startingValue={this.state.vote.agv}
          style={{ paddingVertical: 10 , marginLeft: 20}}
        />
        <Text style={{lineHeight: 35, fontSize: 9, marginLeft: 7, color: 'gray'}}>(vote: {this.state.vote.agv}/{this.state.vote.maxVote})</Text>
      </View>
      <FlatList
        data={this.state.vote.posts}
        renderItem={({item}) => (
          <View style={{flexDirection: 'column', marginBottom: 15}}>
            <View style={{flexDirection: 'row'}}>
              <Avatar rounded source={require('../assets/avataUser.png')} size="small"/>
              <Text style={{lineHeight: 35, color: 'gray', fontSize: 13, marginLeft: 25}}>{item.name}</Text>
              <Rating
                ratingColor='#3498db'
                ratingBackgroundColor='#c8c7c8'
                ratingCount={this.state.vote.maxVote}
                imageSize={15}
                startingValue={item.vote}
                style={{ paddingVertical: 10 , marginLeft: 20}}
              />
            </View>
            <Text>
              {item.content}
            </Text>
          </View>
        )}
      />
    </View>);
  }
  render()
  {
    return (
      <View style={styles.container}>
        {this.state.isLoading?
          <ScrollView>
            {this.showDetailProduct()}
            {this.state.isLoadingVote?
              this.showListVotes()
              :null
            }
          </ScrollView>
          : <Text>Loadding</Text>
        }
      </View>
    );
  }
}
