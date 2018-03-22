<style scoped lang="less">
    .layout{
        border: 1px solid #d7dde4;
        background: #f5f7f9;
        position: relative;
        border-radius: 4px;
        overflow: hidden;
        min-height: 100%;
    }
    .layout-logo{
        width: 100px;
        height: 30px;
        /*background: #5b6270;*/
        border-radius: 3px;
        float: left;
        position: relative;
        top: 15px;
        left: 20px;
    }

    .layout-nav{
        width: 250px;
        margin: 0 auto;
        margin-right: 20px;
    }
    .layout-footer{
        text-align:center
    }
    .layout-content{
        margin: 88px 20px 0 ;
        background: #fff;
        min-height: 735px;
    }
</style>
<template>
    <div class="layout">
        <Layout>
            <Header>
                <div class="layout-logo"></div>
                <div class="layout-nav">
                    <Menu mode="horizontal" theme="dark">
                        <MenuItem name="1" theme="dark">
                            <Icon type="log-in"></Icon>
                            登录
                        </MenuItem>
                        <MenuItem name="1" theme="dark">
                            <Icon type="android-arrow-up"></Icon>
                            注册
                        </MenuItem>
                    </Menu>
                </div>
            </Header>
            <Content  class="layout-content">
                <AutoComplete
                        v-model="value4"
                        icon="ios-search"
                        placeholder="input keyword"
                        @on-search="searchInput"
                        >
                    <div class="demo-auto-complete-item" v-for="item in data4">
                        <div class="demo-auto-complete-group">
                            <span>{{ item.title }}</span>
                            <a href="https://www.google.com/search?q=iView" target="_blank">更多</a>
                        </div>
                        <Option v-for="option in item.children" :value="option.title" :key="option.title">
                            <span class="demo-auto-complete-title">{{ option.title }}</span>
                            <span class="demo-auto-complete-count">{{ option.count }} 人关注</span>
                        </Option>
                    </div>
                    <a href="https://www.google.com/search?q=iView" target="_blank" class="demo-auto-complete-more">查看所有结果</a>
                </AutoComplete>
            </Content>
            <Footer class="layout-footer"> owlet </Footer>
        </Layout>
    </div>
</template>
<script>
//    import 'libs/searchSuggest.js';
    export default {
        data:function () {
          return {
              suggest:'xiao',
              value4: '',
              data4: [
                  {
                      title: '话题',
                      children: [
                          {
                              title: 'iView',
                              count: 10000,

                          },
                          {
                              title: 'iView UI',
                              count: 10600,

                          }
                      ]
                  },
                  {
                      title: '问题',
                      children: [
                          {
                              title: 'iView UI 有多好',
                              count: 60100,

                          },
                          {
                              title: 'iView 是啥',
                              count: 30010,

                          }
                      ]
                  },
                  {
                      title: '文章',
                      children: [
                          {
                              title: 'iView 是一个设计语言',
                              count: 100000,

                          }
                      ]
                  }
              ]
          };
        },
        methods: {
            handleStart () {
                this.$Modal.info({
                    title: 'Bravo',
                    content: 'Now, enjoy the convenience of iView.'
                });
            },
            searchInput:function (value) {
                console.log('value')
//                console.log(test());
            }
        },
        component:{
            'i-col':'Col',
            'i-button':'Button'
        }
    }
</script>
