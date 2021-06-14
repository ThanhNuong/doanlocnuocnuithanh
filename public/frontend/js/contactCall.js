// get media device of user
navigator.mediaDevices.getUserMedia =
  navigator.mediaDevices.getUserMedia ||
  navigator.mediaDevices.webkitGetUserMedia ||
  navigator.mediaDevices.mozGetUserMedia ||
  navigator.mediaDevices.msGetUserMedia;

let connect = false


if (navigator.mediaDevices) {
  $('.call').on('click', async () => {
    console.log('call');
    // get video/voice stream
    // quay nè => trả về stream
    const stream = await navigator.mediaDevices.getUserMedia({
      video: true,
      audio: true
    })


    window.localSteam = stream

    $('.my-video').each((i, vd) => {
      if ('srcObject' in vd) {
        vd.srcObject = stream;
      } else {
        vd.src = window.URL.createObjectURL(stream);
      }
    })

    // create peer
    const peer = new SimplePeer({
      initiator: true, // init -> offer peer -> call
      trickle: false
    });
    window.localPeer = peer

    // add events
    peer.on('connect', () => {
      console.log('call connection');
       connect = true
       peer.addStream(stream)
    });

    peer.on('close', () => {
      console.log('call close');
    });

    peer.on('data', (data) => { // nhận chỗ này và ngược lại
      console.log(data.toString())
      const dataObj = JSON.parse(data.toString())
      // console.log(dataObj)
      if (dataObj.type === 'signal-add-stream') {
        peer.signal(dataObj.signal)
      }
    });

    peer.on('error', (err) => console.log(err.code));

    peer.on('stream', (stream2) => { // stream2 là stream video và audio của đối tác
      console.log(stream2);
      $('.video').each((i, vd) => { // add vào element video của đôi tác => xong
        if ('srcObject' in vd) {
          vd.srcObject = stream2;
        } else {
          vd.src = window.URL.createObjectURL(stream2);
        }
      })
  
    });

    // peer.on('track', (track, stream2) => {

    //   $('.video').each((i, vd) => {
    //     if ('srcObject' in vd) {
    //       vd.srcObject = stream2;
    //     } else {
    //       vd.src = window.URL.createObjectURL(stream2);
    //     }
    //   })
    // });

    peer.on('signal', (signal) => {
      console.log('call signal');
      console.log(signal);
      if (connect) {
        peer.send(JSON.stringify({ /// send
          type: 'signal-add-stream',
          signal
        }))
      } else {
        $('.signal-offer').val(JSON.stringify(signal))
      }
    });
  })

  // connect with answer
  $('.contect-answer').on('click', () => {
    window.localPeer.signal(JSON.parse($('.signal-answer').val())) // call kết nối với nhận nè
  })


  // answer
  $('.contect-offer').on('click', async () => {
    const stream = await navigator.mediaDevices.getUserMedia({
      video: true,
      audio: true
    })

    $('.my-video').each((i, vd) => {
      if ('srcObject' in vd) {
        vd.srcObject = stream;
      } else {
        vd.src = window.URL.createObjectURL(stream);
      }
    })

    // create peer answer
    const peer = new SimplePeer({
      initiator: false, // init -> offer peer -> answer
      trickle: false
    });

    // add events
    peer.on('connect', () => {
      console.log('call connection');
       connect = true
      peer.addStream(stream)
    });

    peer.on('close', () => {
      console.log('call close');
    });

    peer.on('data', (data) => { // nhận
      console.log(data.toString())
      const dataObj = JSON.parse(data.toString())
      // console.log(dataObj)
      if (dataObj.type === 'signal-add-stream') {
        peer.signal(dataObj.signal)
      }
    });

    peer.on('error', (err) => console.log(err.code));

    peer.on('stream', (stream2) => { // tương tự
      console.log(stream2);

      $('.video').each((i, vd) => {
        if ('srcObject' in vd) {
          vd.srcObject = stream2;
        } else {
          vd.src = window.URL.createObjectURL(stream2);
        }
      })
    });

    // peer.on('track', (track, stream2) => {
    //   console.log('call track');
    //   console.log(stream2);
    //   console.log(track);

    //   $('.video').each((i, vd) => {
    //     if ('srcObject' in vd) {
    //       vd.srcObject = stream2;
    //     } else {
    //       vd.src = window.URL.createObjectURL(stream2);
    //     }
    //   })
    // });

    peer.on('signal', (signal) => {
      console.log('answer signal');
      console.log(signal);
      if (connect) {
        peer.send(JSON.stringify({ // send chỗ này
          type: 'signal-add-stream',
          signal
        }))
      } else {
        $('.signal-answer').val(JSON.stringify(signal))
      }
    });

    peer.signal(JSON.parse($('.signal-offer').val())) // kết nối nè, nhận kết nối với gọi
  })
}