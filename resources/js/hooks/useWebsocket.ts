import { onMounted, onUnmounted } from 'vue'

export function useWebsocket(
  channel: string,
  events: { [key: string]: (e: SocketEvent) => void },
  privateChannel = true
) {
  let subbedChannel = Echo.channel(channel)
  if (privateChannel) {
    subbedChannel = Echo.private(channel)
  }

  onMounted(() => {
    for (const [event, callback] of Object.entries(events)) {
      subbedChannel.listen(event, callback)
    }
  })

  onUnmounted(() => {
    for (const [event, callback] of Object.entries(events)) {
      subbedChannel.stopListening(event, callback)
    }
  })
}
