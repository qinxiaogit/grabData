FROM  golang
RUN  mkdir -p /go/src/GoBelieveIO
WORKDIR /go/src/GoBelieveIO
COPY . /go/src/GoBelieveIO
CMD ["go-wrapper", "run"]
ONBUILD COPY . /go/src/GoBelieveIO
ONBUILD RUN go-wrapper download
ONBUILD RUN go-wrapper install

RUN  cd im_service
RUN  go get google.golang.org/grpc
  
RUN  go get -u github.com/golang/protobuf/{proto,protoc-gen-go}
  
RUN  export PATH=$PATH:$GOPATH/bin

RUN  protoc -Irpc/ rpc/rpc.proto --go_out=plugins=grpc:rpc
 
RUN  python -m grpc.tools.protoc -Irpc --python_out=rpc/ --grpc_python_out=rpc/ rpc/rpc.proto

RUN mkdir bin

RUN go get github.com/bitly/go-simplejson

RUN go get github.com/golang/glog

RUN go get github.com/go-sql-driver/mysql

RUN go get github.com/garyburd/redigo/redis

RUN go get github.com/googollee/go-engine.io

RUN go get github.com/richmonkey/cfg

RUn go get github.com/valyala/gorpc

RUN go get google.golang.org/grpc

RUN go get -d -v
RUN go install -v

RUN make install